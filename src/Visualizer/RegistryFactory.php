<?php

namespace GeoVisualizer\Visualizer;

use DI\Container;
use GeoVisualizer\FactoryInterface;

class RegistryFactory implements FactoryInterface
{
    /**
     * Create a collector registry, then add each collector
     * @return Registry
     */
    public function create(Container $container)
    {
        $registry = new Registry();

        $registry->addVisualizer(new GoogleMaps\Visualizer($container));

        return $registry;
    }
}