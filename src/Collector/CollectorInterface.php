<?php

namespace GeoVisualizer\Collector;

use Zend\Stdlib\ParametersInterface;

interface CollectorInterface
{
    public function getSlug();

    public function getName();

    public function fetchGeoPoints(ParametersInterface $parameters);
}