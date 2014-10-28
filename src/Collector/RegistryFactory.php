<?php

namespace GeoVisualizer\Collector;

use DI\Container;
use GeoVisualizer\FactoryInterface;

class RegistryFactory implements FactoryInterface
{
    /**
     * Create a collector registry, then add each collector
     * @todo Refactor so it does not use the DI container like a service locator
     * @param Container $container
     * @return Registry
     */
    public function create(Container $container)
    {
        $registry = new Registry();

        $collector = $container->get('\GeoVisualizer\Collector\Twitter\Collector');
        $registry->addCollector($collector);

        return $registry;
    }
}