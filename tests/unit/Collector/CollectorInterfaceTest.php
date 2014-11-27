<?php

class Collector_CollectorInterfaceTest extends PHPUnit_Framework_TestCase
{
    private $collector;

    public function setUp()
    {
        $this->collector = $this->getMockForAbstractClass('\GeoVisualizer\Collector\CollectorInterface');
    }

    public function testMethods()
    {
        $this->assertTrue(method_exists($this->collector, 'getSlug'));
        $this->assertTrue(method_exists($this->collector, 'getName'));
        $this->assertTrue(method_exists($this->collector, 'fetchGeoPoints'));
    }
}