<?php

namespace GeoVisualizer\Collector\Twitter;

use DI\Container;
use GeoVisualizer\Collector\CollectorAbstract;
use GeoVisualizer\GeoPoint;
use Zend\Stdlib\ParametersInterface;

class Collector extends CollectorAbstract
{
    /** @var string */
    protected $name = 'Twitter';

    /** @var \TwitterOAuth\Api */
    private $api;

    /**
     * @param Container $container
     * @throws \DI\NotFoundException
     */
    public function __construct(Container $container)
    {
        /** @var \GeoVisualizer\Collector\Twitter\ApiFactory $apiFactory */
        $apiFactory = $container->get('\GeoVisualizer\Collector\Twitter\ApiFactory');

        /** @var \TwitterOAuth\Api $api */
        $this->api = $apiFactory->create($container);
    }

    public function fetchGeoPoints(ParametersInterface $parameters)
    {
        $response = $this->api->get($this->buildSearchUrl(), $this->filterParameters($parameters));

        $geoPoints = array();
        foreach ($response->statuses as $status) {

            if (is_null($status->geo)) {
                continue;
            }

            var_dump($status->geo->coordinates);

            $geoPoint = new GeoPoint(
                $status->geo->coordinates[0],
                $status->geo->coordinates[1],
                $status->text
            );

            var_dump($geoPoint);

            $geoPoints[] = $geoPoint;

        }

        echo '<pre>';
        //var_dump($response);
        echo '</pre>';

        return $geoPoints;
    }

    private function buildSearchUrl()
    {
        return 'https://api.twitter.com/1.1/search/tweets.json';
    }

    /**
     * Filter and format the standard parameters to be consumed by the Twitter API
     * @param ParametersInterface $parameters
     * @return array
     */
    private function filterParameters(ParametersInterface $parameters)
    {
        return array(
            'q' => $parameters->get('search')
        );
    }
}