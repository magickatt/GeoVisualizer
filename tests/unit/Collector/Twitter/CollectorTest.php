<?php

class Collector_Twitter_CollectorTest extends PHPUnit_Framework_TestCase
{
    private $collector;

    public function setUp()
    {
        $diContainer = $this->getMockBuilder('DI\Container')
                            ->disableOriginalConstructor()
                            ->getMock();

        $api = $this->getMockBuilder('\TwitterOAuth\Api')
                    ->disableOriginalConstructor()
                    ->getMock();

        $apiFactory = $this->getMockBuilder('\GeoVisualizer\Collector\Twitter\ApiFactory')
                           ->disableOriginalConstructor()
                           ->getMock();

        $apiFactory->expects($this->once())
                   ->method('create')
                   ->willReturn($api);

        $diContainer->expects($this->once())
                    ->method('get')
                    ->with($this->equalTo('\GeoVisualizer\Collector\Twitter\ApiFactory'))
                    ->willReturn($apiFactory);

        $this->collector = new \GeoVisualizer\Collector\Twitter\Collector($diContainer);
    }

    public function testConstructor()
    {
        // Optional: Test anything here, if you want.
        $this->assertTrue(TRUE, 'This should already work.');
    }
}