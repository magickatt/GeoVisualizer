<?php

namespace GeoVisualizer\Collector;

use GeoVisualizer\Configuration;
use Zend\Stdlib\ParametersInterface;

abstract class CollectorAbstract implements CollectorInterface
{
    /** @var string */
    protected $name;

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slugify($this->getName());
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    abstract public function fetchGeoPoints(ParametersInterface $parameters, $geoPoints = array());

    /**
     * @link http://stackoverflow.com/questions/2955251/php-function-to-make-slug-url-string
     * @param $text
     * @return string
     */
    private function slugify($text)
    {
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        $text = trim($text, '-');
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = strtolower($text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        return $text;
    }
}