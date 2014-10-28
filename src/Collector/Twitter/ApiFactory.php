<?php

namespace GeoVisualizer\Collector\Twitter;

use DI\Container;
use GeoVisualizer\FactoryInterface;
use TwitterOAuth\Api;

class ApiFactory implements FactoryInterface
{
    /**
     * @param Container $container
     * @return Api
     * @throws \DI\NotFoundException
     */
    public function create(Container $container)
    {
        /** @var Configuration $configuration */
        $configuration = $container->get('\GeoVisualizer\Collector\Twitter\Configuration');
        $array = $configuration->parseConfiguration();

        return new Api(
            $array[Configuration::CONSUMER_KEY],
            $array[Configuration::CONSUMER_SECRET],
            $array[Configuration::OAUTH_TOKEN],
            $array[Configuration::OAUTH_TOKEN_SECRET]
        );
    }
}