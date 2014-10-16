<?php

namespace GeoVisualizer\Collector;

class Registry
{
    private $collectors = array();

    public function addCollector(CollectorInterface $collector)
    {
        $this->collectors[$collector->getSlug()] = $collector;
    }

    public function getAll()
    {
        return $this->collectors;
    }

    public function getAllNames()
    {
        $names = array();
        foreach ($this->collectors as $collector) {
            $names[] = $collector->getName();
        }
        return $names;
    }
}