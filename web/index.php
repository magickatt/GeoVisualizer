<?php

require __DIR__ . '/../vendor/autoload.php';

$application = new \Slim\Slim();

$application->get('/', function () {
    $collector = new \GeoVisualizer\Collector\GoogleMaps\Collector();
    echo "Hello world!";
});

$application->run();