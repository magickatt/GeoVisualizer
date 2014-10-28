<?php

namespace GeoVisualizer\Collector;

use GeoVisualizer\RegistryInterface;

class Registry implements RegistryInterface
{
    /** @var CollectorInterface[] */
    private $collectors = array();

    /**
     * @param CollectorInterface $collector
     */
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

    /**
     * @return CollectorInterface[]
     */
    public function getAll()
    {
        return $this->collectors;
    }

    /**
     * @return string[]
     */
    public function getAllNames()
    {
        $names = array();
        foreach ($this->collectors as $collector) {
            $names[$collector->getSlug()] = $collector->getName();
        }
        return $names;
    }
}