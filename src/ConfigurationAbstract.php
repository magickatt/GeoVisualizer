<?php

namespace GeoVisualizer;

use fkooman\Ini\IniReader;

abstract class ConfigurationAbstract
{
    /** @var string */
    protected $file;

    public function parseConfiguration()
    {
        $iniReader = $this->openFile($this->file);

        if ($iniReader instanceof IniReader) {
            return $this->getSpecificConfiguration($iniReader);
        }
    }

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

    private function getDirectory()
    {
        return __DIR__ . '/../config/';
    }
}