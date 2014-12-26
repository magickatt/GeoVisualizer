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

    private $numberOfTweets = 20;

    /** @var integer Probability that a tweet in a given batch will be geotagged */
    private $geotaggedTweetProbabilityMultiplier = 25;

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

    public function fetchGeoPoints(ParametersInterface $parameters, $geoPoints = array())
    {
        $response = $this->api->get($this->buildSearchUrl(), $this->filterParameters($parameters));

        foreach ($response->statuses as $status) {

            // Majority of tweets do not have geotags, therefore we need to discard most of them
            if (is_null($status->geo)) {
                continue;
            }

            $geoPoint = new GeoPoint(
                $status->geo->coordinates[0],
                $status->geo->coordinates[1],
                $status->text
            );

            $geoPoints[] = $geoPoint;
            $parameters->set('lastId', $status->id);

        }

        if (count($geoPoints) < $this->numberOfTweets) {
            $geoPoints = $this->fetchGeoPoints($parameters, $geoPoints);
        }

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
            'q' => $parameters->get('search'),
            'count' => $this->numberOfTweets * $this->geotaggedTweetProbabilityMultiplier,
            'max_id' => $parameters->get('lastId') - 1,
        );
    }
}