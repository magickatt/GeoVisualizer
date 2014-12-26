<?php

require __DIR__ . '/../vendor/autoload.php';

$application = new \Slim\Slim();
$application->view->setTemplatesDirectory(__DIR__ . '/../view/');

$builder = new \DI\ContainerBuilder();
$container = $builder->build();

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

    $parameters = new \Zend\Stdlib\Parameters(array('search' => $application->request()->post('term')));
    $geoPoints = $collector->fetchGeoPoints($parameters);

    $sessionFactory = new \Aura\Session\SessionFactory;
    $session = $sessionFactory->newInstance($_COOKIE);
    $segment = $session->getSegment('GeoVisualizer');

    $segment->set('geoPoints', $geoPoints);

    $visualizerRegistryFactory = new \GeoVisualizer\Visualizer\RegistryFactory();
    $visualizerRegistry = $visualizerRegistryFactory->create($container);
    echo $application->render('visualizers.php', array('visualizers' => $visualizerRegistry->getAllNames(), 'geoPoints' => $geoPoints));
});

$application->get('/visualizer/:visualizerName', function ($visualizerSlug) use ($application, $container) {

    $visualizerRegistryFactory = new \GeoVisualizer\Visualizer\RegistryFactory();
    $visualizerRegistry = $visualizerRegistryFactory->create($container);
    $visualizer = $visualizerRegistry->getWithSlug($visualizerSlug);

    $sessionFactory = new \Aura\Session\SessionFactory;
    $session = $sessionFactory->newInstance($_COOKIE);
    $segment = $session->getSegment('GeoVisualizer');

    $geoPoints = $segment->get('geoPoints');

    $metadata = $visualizer->consume($geoPoints);

    echo $application->render('visualizer/' . (string)$visualizerSlug . '.php', array(
        'geoPoints' => $geoPoints,
        'head' => $visualizer->generateHead(),
        'body' => $visualizer->generateBody(),
        'parameters' => $visualizer->generateParameters(),
    ));
});

$application->run();