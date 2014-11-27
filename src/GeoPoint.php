<?php

namespace GeoVisualizer;

class GeoPoint
{
    private $latitude;

    private $longitude;

    private $description;

    public function __construct($latitude, $longitude, $description = null)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->description = $description;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }
}