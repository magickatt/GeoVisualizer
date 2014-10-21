<?php

require __DIR__ . '/../vendor/autoload.php';

$application = new \Slim\Slim();
$application->view->setTemplatesDirectory(__DIR__ . '/../view/');

$application->get('/', function () use ($application) {
    $collectorRegistryFactory = new \GeoVisualizer\Collector\RegistryFactory();
    $collectorRegistry = $collectorRegistryFactory->create();

    echo $application->render('index.php', array('collectors' => $collectorRegistry->getAllNames()));

});

$application->run();