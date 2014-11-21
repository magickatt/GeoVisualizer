<?php
//
//class Collector_Twitter_CollectorTest extends PHPUnit_Framework_TestCase
//{
//    private $collector;
//
//    public function setUp()
//    {
//        $diContainer = $this->getMockBuilder('DI\Container')
//                            ->disableOriginalConstructor()
//                            ->getMock();
//
//        $api = $this->getMockBuilder('\TwitterOAuth\Api')
//                    ->disableOriginalConstructor()
//                    ->getMock();
//
//        $diContainer->expects('get')
//            ->with('\GeoVisualizer\Collector\Twitter\ApiFactory')
//            ->willReturn($api);
//        $this->collector = new \GeoVisualizer\Collector\Twitter\Collector($diContainer);
//    }
//
//    public function testConstructor()
//    {
//        // Optional: Test anything here, if you want.
//        $this->assertTrue(TRUE, 'This should already work.');
//    }
//}