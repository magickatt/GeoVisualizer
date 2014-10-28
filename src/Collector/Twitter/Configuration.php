<?php

namespace GeoVisualizer\Collector\Twitter;

use fkooman\Ini\IniReader;
use GeoVisualizer\ConfigurationAbstract;

class Configuration extends ConfigurationAbstract
{
    /** @var string */
    protected $file = 'collector/twitter.ini';

    const CONSUMER_KEY = 'consumer_key';

    const CONSUMER_SECRET = 'consumer_secret';

    const OAUTH_TOKEN = 'oauth_token';

    const OAUTH_TOKEN_SECRET = 'oauth_token_secret';

    /**
     * @param IniReader $iniReader
     * @return array
     */
    protected function getSpecificConfiguration(IniReader $iniReader)
    {
        return array(
            self::CONSUMER_KEY => $iniReader->v(self::CONSUMER_KEY),
            self::CONSUMER_SECRET => $iniReader->v(self::CONSUMER_SECRET),
            self::OAUTH_TOKEN => $iniReader->v(self::OAUTH_TOKEN),
            self::OAUTH_TOKEN_SECRET => $iniReader->v(self::OAUTH_TOKEN_SECRET),
        );
    }
}
