<?php

class Collector_CollectorAbstractTest extends PHPUnit_Framework_TestCase
{
    private $collector;

    public function setUp()
    {
        $this->collector = $this->getMockForAbstractClass('\GeoVisualizer\Collector\CollectorAbstract');
    }

    public function testSlug()
    {
        $this->markTestIncomplete();
    }
}