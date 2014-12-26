<?php

namespace GeoVisualizer\Visualizer\GoogleMaps;

use GeoVisualizer\Visualizer\VisualizerAbstract;

class Visualizer extends VisualizerAbstract
{
    protected $name = 'Google Maps';

    public function consume(array $geoPoints)
    {
        foreach ($geoPoints as $geoPoint) {

        }
    }
}