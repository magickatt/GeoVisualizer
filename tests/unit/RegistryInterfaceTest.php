<?php

class RegistryInterfaceTest extends PHPUnit_Framework_TestCase
{
    private $registry;

    public function setUp()
    {
        $this->registry = $this->getMockForAbstractClass('\GeoVisualizer\RegistryInterface');
    }

    public function testMethods()
    {
        $this->assertTrue(method_exists($this->registry, 'getAll'));
        $this->assertTrue(method_exists($this->registry, 'getAllNames'));

    }

}