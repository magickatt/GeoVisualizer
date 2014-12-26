<?php

namespace GeoVisualizer\Visualizer;

interface VisualizerInterface
{
    public function getSlug();

    public function getName();

    public function consume(array $geoPoints);

}