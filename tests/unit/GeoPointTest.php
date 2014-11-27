<?php

use GeoVisualizer\GeoPoint;

class GeoPointTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {

    }

    public function testCasting()
    {
        $geoPoint = new GeoPoint('1', "2", 12);

        $this->assertInternalType('float', $geoPoint->getLatitude());
        $this->assertInternalType('float', $geoPoint->getLongitude());
        $this->assertInternalType('string', $geoPoint->getDescription());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testNonNumericCoordinates()
    {
        $geoPoint = new GeoPoint('one', 'two', 'One two');
    }
}