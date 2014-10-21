<?php

require __DIR__ . '/../vendor/autoload.php';

$application = new \Slim\Slim();
$application->view->setTemplatesDirectory(__DIR__ . '/../view/');

$application->get('/', function () use ($application) {
    $collectorRegistryFactory = new \GeoVisualizer\Collector\RegistryFactory();
    $collectorRegistry = $collectorRegistryFactory->create();
    echo $application->render('collectors.php', array('collectors' => $collectorRegistry->getAllNames()));
});

$application->get('/collector/:collectorName', function ($collectorSlug) use ($application) {
    echo $application->render('collector/' . (string)$collectorSlug . '.php');
});

$application->post('/collector/:collectorName', function ($collectorSlug) use ($application) {
    $collectorRegistryFactory = new \GeoVisualizer\Collector\RegistryFactory();
    $collectorRegistry = $collectorRegistryFactory->create();
    $collector = $collectorRegistry->getWithSlug($collectorSlug);

    /*
     * Do something
     */

    $visualizerRegistryFactory = new \GeoVisualizer\Visualizer\RegistryFactory();
    $visualizerRegistry = $visualizerRegistryFactory->create();
    echo $application->render('visualizers.php', array('visualizers' => $visualizerRegistry->getAllNames()));
});

$application->get('/visualizer/:visualizerName', function ($visualizerSlug) use ($application) {
    echo $application->render('visualizer/' . (string)$visualizerSlug . '.php');
});

$application->run();