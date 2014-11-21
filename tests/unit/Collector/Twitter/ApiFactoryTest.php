<?php

use GeoVisualizer\Collector\Twitter\ApiFactory;
use GeoVisualizer\Collector\Twitter\Configuration;

class Collector_Twitter_ApiFactoryTest extends PHPUnit_Framework_TestCase
{
    /** @var ApiFactory */
    private $apiFactory;

    public function setUp()
    {
        $this->apiFactory = new ApiFactory();
    }

    public function testCreate()
    {
        $this->markTestIncomplete();

        $serviceLocator = $this->getMockBuilder('DI\Container')
                          ->disableOriginalConstructor()
                          ->getMock();

        $sampleData = array(
            Configuration::CONSUMER_KEY => 'testConsumerKey',
            Configuration::CONSUMER_SECRET => 'testSecret',
            Configuration::OAUTH_TOKEN => 'testOauthToken',
            Configuration::OAUTH_TOKEN_SECRET => 'testOauthTokenSecret'
        );

        $api = $this->apiFactory->create($serviceLocator);

        $this->assertInstanceOf('\Twitter\OAuth\Api', $api);
    }
}