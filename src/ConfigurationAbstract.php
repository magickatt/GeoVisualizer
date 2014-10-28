<?php

namespace GeoVisualizer;

use fkooman\Ini\IniReader;

abstract class ConfigurationAbstract
{
    /** @var string */
    protected $file;

    /**
     * @return array|null
     */
    public function parseConfiguration()
    {
        $iniReader = $this->openFile($this->file);

        if ($iniReader instanceof IniReader) {
            return $this->getSpecificConfiguration($iniReader);
        }
    }

    /**
     * @param IniReader $iniReader
     * @return array|null
     */
    abstract protected function getSpecificConfiguration(IniReader $iniReader);

    /**
     * @param string $file
     * @return IniReader|null
     */
    private function openFile($file)
    {
        $file = $this->getDirectory() . $file;
        if (file_exists($file)) {
            return IniReader::fromFile($file);
        }
    }

    /**
     * @return string
     */
    private function getDirectory()
    {
        return __DIR__ . '/../config/';
    }
}