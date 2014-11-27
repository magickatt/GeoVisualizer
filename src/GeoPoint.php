<?php

namespace GeoVisualizer;

class GeoPoint
{
    /** @var float */
    private $latitude;

    /** @var float */
    private $longitude;

    /** @var string */
    private $description;

    public function __construct($latitude, $longitude, $description = null)
    {
        if (! is_numeric($latitude) || ! is_numeric($longitude)) {
            throw new \InvalidArgumentException('Latitude and longitude must be numeric');
        }

        $this->latitude = (float) $latitude;
        $this->longitude = (float) $longitude;
        $this->description = (string) $description;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function getDescription()
    {
        return $this->description;
    }
}