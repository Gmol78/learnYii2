<?php


namespace app\controllers;

use yii\web\Controller;
use app\models\Prodact;

/**
 * Description of testController
 *
 * @author igor
 */
class TestController extends Controller {
    /** 
     * 
     * @return string
     */
    function actionIndex() {
        $prop = \Yii::$app->test->getProperty();
        return $this->render('index', ['data'=>$prop]);
        
        //$model = new Prodact();
        //$model->setPropertes(12, 'best prodact', 'tools', '300');
        //return $this->render('index', ['data'=>$model]);
    }
}
