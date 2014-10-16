<?php

namespace GeoVisualizer\Collector;

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

        $registry->addCollector(new Twitter\Collector());

        return $registry;
    }
}