<?php

namespace GeoVisualizer\Collector\Twitter;

use DI\Container;
use GeoVisualizer\Collector\CollectorAbstract;
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
        $t = $this->api->get($this->buildSearchUrl(), $this->filterParameters($parameters));
        var_dump($t);

        return array();
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