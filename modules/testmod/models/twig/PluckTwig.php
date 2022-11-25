<?php

namespace modules\testmod\models\twig;

use \Twig\TwigFunction;

class PluckTwig extends \Twig\Extension\AbstractExtension
{
    public function getFunctions() : array
    {
        return [  
            new TwigFunction('pluck', [$this, 'pluck']),
        ];
    }
        
    /**
        * @param array<mixed, object> $arr
        * @return array<mixed, object>
    */
    public function pluck(array $arr, string $key) : array
    {
        return array_map(function($val) use ($key) {
            return $val->$key;
        }, $arr);
    }
}
