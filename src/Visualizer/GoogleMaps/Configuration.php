<?php

namespace GeoVisualizer\Visualizer\GoogleMaps;

use fkooman\Ini\IniReader;
use GeoVisualizer\ConfigurationAbstract;

class Configuration extends ConfigurationAbstract
{
    /** @var string */
    protected $file = 'visualizer/google-maps.ini';

    /** @var string */
    const API_KEY = 'api_key';

    /**
     * @param IniReader $iniReader
     * @return array
     */
    protected function getSpecificConfiguration(IniReader $iniReader)
    {
        return array(
            self::API_KEY => $iniReader->v(self::API_KEY),
        );
    }
}