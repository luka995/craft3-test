<?php
namespace modules\testmod\controllers;


use Craft;
use craft\web\View;
use modules\testmod\models\DataReader;

class DefaultController extends \craft\web\Controller
{

    
    public function init(): void {
        $this->allowAnonymous = true;
        parent::init();
    }
    
    public function actionIndex() : string {
        Craft::$app->getView()->setTemplateMode(View::TEMPLATE_MODE_CP);
        
        $data = DataReader::readData('https://wizard-world-api.herokuapp.com', 'Houses');
        
        
        return Craft::$app->getView()->renderTemplate("testmod/default/index", ['data' => $data]);
    }
}
