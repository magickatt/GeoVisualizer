<?php

namespace GeoVisualizer;

use DI\Container;

interface FactoryInterface
{
    public function create(Container $container);
}