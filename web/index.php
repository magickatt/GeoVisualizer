<?php

require __DIR__ . '/../vendor/autoload.php';

$application = new \Slim\Slim();
$application->view->setTemplatesDirectory(__DIR__ . '/../view/');

$builder = new \DI\ContainerBuilder();
$container = $builder->build();
//$container->useAutowiring(true);

$application->get('/', function () use ($application, $container) {
    $collectorRegistryFactory = new \GeoVisualizer\Collector\RegistryFactory();
    $collectorRegistry = $collectorRegistryFactory->create($container);
    echo $application->render('collectors.php', array('collectors' => $collectorRegistry->getAllNames()));
});

$application->get('/collector/:collectorName', function ($collectorSlug) use ($application) {
    echo $application->render('collector/' . (string)$collectorSlug . '.php');
});

$application->post('/collector/:collectorName', function ($collectorSlug) use ($application, $container) {
    $collectorRegistryFactory = new \GeoVisualizer\Collector\RegistryFactory();
    $collectorRegistry = $collectorRegistryFactory->create($container);
    $collector = $collectorRegistry->getWithSlug($collectorSlug);

    /*
     * Do something
     */
    $parameters = new \Zend\Stdlib\Parameters(array('search' => 'hats'));
    $geoPoints = $collector->fetchGeoPoints($parameters);

    $visualizerRegistryFactory = new \GeoVisualizer\Visualizer\RegistryFactory();
    $visualizerRegistry = $visualizerRegistryFactory->create($container);
    echo $application->render('visualizers.php', array('visualizers' => $visualizerRegistry->getAllNames(), 'geoPoints' => $geoPoints));
});

$application->get('/visualizer/:visualizerName', function ($visualizerSlug) use ($application) {
    echo $application->render('visualizer/' . (string)$visualizerSlug . '.php');
});

$application->run();