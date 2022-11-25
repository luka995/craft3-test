<?php

namespace modules\testmod;

use Craft;
use craft\events\RegisterTemplateRootsEvent;
use craft\web\View;
use yii\base\Event;

/**
 * Description of Test
 *
 * @author Luka
 */
class Module extends \yii\base\Module
{
    
    public function init() : void
    {
        parent::init();
        
        Event::on(View::class, View::EVENT_REGISTER_CP_TEMPLATE_ROOTS, function (RegisterTemplateRootsEvent $e) {
            if (is_dir($baseDir = $this->getBasePath().'/templates')) {
                $e->roots[$this->id] = $baseDir;
            }
        });                          
            
        $extension = new models\twig\PluckTwig();        
        Craft::$app->view->registerTwigExtension($extension);        
        
    }
}