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
        return $this->render('index', ['data' => $prop]);

        //$model = new Prodact();
        //$model->setPropertes(12, 'best prodact', 'tools', '300');
        //return $this->render('index', ['data'=>$model]);
    }
    /**
     * 
     */

    function actionInsert() {
        \Yii::$app->db->createCommand()->batchInsert('user', ['username', 'name', 'surname', 'password_hash'], [
            ['Ivan', 'vanya', 'vv', '76567568'],
            ['tom', 'tooo', 'rtrtr', '875875785'],
            ['Make', 'miki', 'mm', '98698698689']
        ])->execute();
    }
    
    function actionInsnote(){
        
        \Yii::$app->db->createCommand()->batchInsert('note', ['text', 'creator_id', 'crated_at'],[
            ['texttext1111', '1', 6654654],
            ['text2222222', '2', 75876784],
            ['3333333333', '3', 66767665]
        ])->execute();
    }
    
    function actionSelect() {
        $user = (new \yii\db\Query())
              //  ->select('*')  не нужно
                ->from('user')
                ->where(['id'=> 1])
                ->all();
        echo '<pre>';
        \yii\helpers\VarDumper::dump($user);
        echo '</pre>';
        echo '<hr>';
        $usersGroup = (new \yii\db\Query())
             //   ->select('*')
                ->from('user')
                ->where(['>', 'id', 1])
                ->orderBy('name')
                ->all();
        echo '<pre>';
        \yii\helpers\VarDumper::dump($usersGroup);
        echo '</pre>';
        echo '<hr>';
        echo 'Number of items: ';
        $count = (new \yii\db\Query())
                ->select('id')
                ->from('user')
                ->count();
        echo $count;
        echo '<hr>';
        $notes = (new \yii\db\Query)
                ->from('note')
             // ->join('INNER JOIN', 'user', 'user.id = note.creator_id')
                ->innerJoin('user','user.id = note.creator_id')
                ->all();
        echo '<pre>';
        \yii\helpers\VarDumper::dump($notes);
        echo '</pre>';
        
    }

}
