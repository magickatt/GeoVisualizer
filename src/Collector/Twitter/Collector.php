<?php

namespace GeoVisualizer\Collector\Twitter;

use DI\Container;
use GeoVisualizer\Collector\CollectorAbstract;

class Collector extends CollectorAbstract
{
    protected $name = 'Twitter';

    /** @var \TwitterOAuth\Api */
    private $api;

    public function __construct(Container $container)
    {
        /** @var \GeoVisualizer\Collector\Twitter\ApiFactory $apiFactory */
        $apiFactory = $container->get('\GeoVisualizer\Collector\Twitter\ApiFactory');

        /** @var \TwitterOAuth\Api $api */
        $this->api = $apiFactory->create($container);
    }
}