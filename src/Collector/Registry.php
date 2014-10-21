<?php

namespace GeoVisualizer\Collector;

use GeoVisualizer\RegistryInterface;

class Registry implements RegistryInterface
{
    private $collectors = array();

    public function addCollector(CollectorInterface $collector)
    {
        $this->collectors[$collector->getSlug()] = $collector;
    }

    /**
     * @param string $collectorSlug
     * @return CollectorInterface|null
     */
    public function getWithSlug($collectorSlug)
    {
        if (array_key_exists($collectorSlug, $this->collectors)) {
            return $this->collectors[$collectorSlug];
        }
    }

    public function getAll()
    {
        return $this->collectors;
    }

    public function getAllNames()
    {
        $names = array();
        foreach ($this->collectors as $collector) {
            $names[$collector->getSlug()] = $collector->getName();
        }
        return $names;
    }
}