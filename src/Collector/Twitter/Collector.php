<?php

namespace GeoVisualizer\Collector\Twitter;

use GeoVisualizer\Collector\CollectorAbstract;
use TwitterOAuth\Api;

class Collector extends CollectorAbstract
{
    protected $name = 'Twitter';

    /** @var Api */
    private $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
    }
}