<?php

use GeoVisualizer\Collector\Twitter\Configuration;

class Collector_Twitter_ConfigurationTest extends PHPUnit_Framework_TestCase
{
    private $configuration;

    public function setUp()
    {
        $this->configuration = new Configuration();
    }

    public function testGetSpecificConfiguration()
    {
        /*
         * NOTE TO SELF
         * Need to use reflection to override static method default behaviour
         */

        $this->markTestIncomplete();

        $iniReader = $this->getMockBuilder('fkooman\Ini\IniReader')
                          ->disableOriginalConstructor()
                          ->getMock();

        $sampleArray = array(
            self::CONSUMER_KEY => 'testConsumerKey',
            self::CONSUMER_SECRET => 'testConsumerSecret',
            self::OAUTH_TOKEN => 'testOauthToken',
            self::OAUTH_TOKEN_SECRET => 'testPauthTokenSecret',
        );

        $array = $this->configuration->parseConfiguration();

        $this->assertArrayHasKey(Configuration::CONSUMER_KEY, $array);
        $this->assertArrayHasKey(Configuration::CONSUMER_SECRET, $array);
        $this->assertArrayHasKey(Configuration::OAUTH_TOKEN, $array);
        $this->assertArrayHasKey(Configuration::OAUTH_TOKEN_SECRET, $array);

        $this->assertEquals($array[Configuration::CONSUMER_KEY], 'test');
        $this->assertEquals($array[Configuration::CONSUMER_SECRET], 'test');
        $this->assertEquals($array[Configuration::OAUTH_TOKEN], 'test');
        $this->assertEquals($array[Configuration::OAUTH_TOKEN_SECRET], 'test');
    }
}