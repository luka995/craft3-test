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
    
    public function pluck(array $arr, string $key) : array
    {
        return array_map(function($val) use ($key) {
            return is_object($val) ? $val->$key : $val[$key];
        }, $arr);
    }
}
