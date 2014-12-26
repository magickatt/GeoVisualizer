<?php

namespace GeoVisualizer\Visualizer\GoogleMaps;

use DI\Container;
use GeoVisualizer\GeoPoint;
use GeoVisualizer\Visualizer\VisualizerAbstract;

/**
 * Visualize geographical points using Google Maps
 * @package GeoVisualizer\Visualizer\GoogleMaps
 * @todo Create view helpers to deal with JavaScript generation, use this class as an adapter instead
 * @todo Needs string filtering for Twitter tweet text in marker titles
 */
class Visualizer extends VisualizerAbstract
{
    /** @var string */
    protected $name = 'Google Maps';

    /** @var string */
    private $apiKey = '';

    /**
     * @param Container $container
     * @throws \DI\NotFoundException
     */
    public function __construct(Container $container)
    {
        /** @var Configuration $configuration */
        $configuration = $container->get('\GeoVisualizer\Visualizer\GoogleMaps\Configuration');
        $array = $configuration->parseConfiguration();
        $this->apiKey = $array[Configuration::API_KEY];
    }

    public function generateHead()
    {
        $js = <<<SCRIPT
function initialize() {

    var mapOptions = {
        zoom: 3
    };

    var bounds = new google.maps.LatLngBounds();
    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    {$this->generateMarkers()}

    // Fit the zoom and centre based on the markers
    map.fitBounds(bounds);

}
google.maps.event.addDomListener(window, 'load', initialize);
SCRIPT;
        return $js;
    }

    public function generateBody()
    {
        /* Using Google Maps JavaScript V3 so map is all JS */
    }

    public function generateParameters()
    {
        return array('apiKey' => $this->apiKey);
    }

    /**
     * @return string JavaScript containing Google Maps markers
     */
    private function generateMarkers()
    {
        $js = '';
        foreach ($this->geoPoints as $geoPoint) {
            $js .= $this->generateMarker($geoPoint);
        }
        return $js;
    }

    /**
     * @param GeoPoint $geoPoint
     * @return string JavaScript containing a single Google Maps marker
     */
    private function generateMarker(GeoPoint $geoPoint)
    {
        $js = <<<SCRIPT
var myGeoPoint = new google.maps.LatLng({$geoPoint->getLatitude()},{$geoPoint->getLongitude()});

var myGeoPointMarker  = new google.maps.Marker({
    position: myGeoPoint,
    map: map,
    title:"{$geoPoint->getDescription()}"
});

myGeoPointMarker.setMap(map);
bounds.extend(myGeoPointMarker.position);
SCRIPT;
        return $js;
    }

}