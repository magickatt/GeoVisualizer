<?php

use GeoVisualizer\GeoPoint;

class GeoPointTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {

    }

    /**
     * @expectedException \Exception
     */
    public function testCasting()
    {
        $geoPoint = new GeoPoint('1', "2", 'One two');

        $this->assertInternalType('integer', $geoPoint->getLatitude());
    }
}