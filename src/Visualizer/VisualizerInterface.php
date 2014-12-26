<?php

namespace GeoVisualizer\Visualizer;

interface VisualizerInterface
{
    public function getSlug();

    public function getName();

    public function consume(array $geoPoints);

    public function generateHead();

    public function generateBody();

    public function generateParameters();

}