<?php

require __DIR__ . '/../vendor/autoload.php';

$application = new \Slim\Slim();

$application->get('/', function () {
    $collectorRegistryFactory = new \GeoVisualizer\Collector\RegistryFactory();
    $collectorRegistry = $collectorRegistryFactory->create();
    echo implode($collectorRegistry->getAllNames());
});

$application->run();