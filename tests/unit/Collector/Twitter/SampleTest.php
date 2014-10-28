<?php

class Collector_Twitter_CollectorTest extends PHPUnit_Framework_TestCase
{
    private $collector;

    public function setUp()
    {
        $this->collector = new \GeoVisualizer\Collector\Twitter\Collector();
    }

    public function testConstructor()
    {


        // Optional: Test anything here, if you want.
        $this->assertTrue(TRUE, 'This should already work.');
    }
}