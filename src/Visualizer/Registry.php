<?php

namespace GeoVisualizer\Visualizer;

use GeoVisualizer\RegistryInterface;

class Registry implements RegistryInterface
{
    private $visualizers = array();

    public function addVisualizer(VisualizerInterface $visualizer)
    {
        $this->visualizers[$visualizer->getSlug()] = $visualizer;
    }

    /**
     * @param string $visualizerSlug
     * @return VisualizerInterface|null
     */
    public function getWithSlug($visualizerSlug)
    {
        if (array_key_exists($visualizerSlug, $this->visualizers)) {
            return $this->visualizers[$visualizerSlug];
        }
    }

    public function getAll()
    {
        return $this->visualizers;
    }

    public function getAllNames()
    {
        $names = array();
        foreach ($this->visualizers as $visualizer) {
            $names[$visualizer->getSlug()] = $visualizer->getName();
        }
        return $names;
    }
}