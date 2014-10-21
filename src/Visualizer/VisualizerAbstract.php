<?php

namespace GeoVisualizer\Visualizer;

abstract class VisualizerAbstract implements VisualizerInterface
{
    protected $name;

    public function getSlug()
    {
        return $this->slugify($this->getName());
    }

    public function getName()
    {
        return $this->name;
    }

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