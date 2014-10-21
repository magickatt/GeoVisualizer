<?php

namespace GeoVisualizer\Visualizer;

use GeoVisualizer\FactoryInterface;

class RegistryFactory implements FactoryInterface
{
    /**
     * Create a collector registry, then add each collector
     * @return Registry
     */
    public function create()
    {
        $registry = new Registry();

        $registry->addVisualizer(new GoogleMaps\Visualizer());

        return $registry;
    }
}