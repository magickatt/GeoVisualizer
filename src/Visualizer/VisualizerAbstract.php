<?php

namespace GeoVisualizer\Visualizer;

abstract class VisualizerAbstract implements VisualizerInterface
{
    /** @var string */
    protected $name = '';

    /** @var [\GeoVisualizer\GeoPoint] */
    protected $geoPoints = array();

    public function getSlug()
    {
        return $this->slugify($this->getName());
    }

    public function getName()
    {
        return $this->name;
    }

    public function consume(array $geoPoints)
    {
        $this->geoPoints = $geoPoints;
    }

    abstract public function generateHead();

    abstract public function generateBody();

    abstract public function generateParameters();

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