<?php

namespace app\controllers;

use Yii;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
  
    
    public function actionTest() {
      $user = new User;
      $user->attributes = [
            'username' => 'testusername',
            'name' => 'testname',
            'surname' => 'testsurname',
            'password_hash' => '87878778'
        ];
        $user->save();

        $note1 = new \app\models\Note();
        $note1->text = 'text1 user text1 user';
        $note1->link('creator', $user);
        $note1->save();
        $user->link('accessedNotes', $note1);

        $note2 = new \app\models\Note();
        $note2->text = 'text2 user text2 user';
        $note2->link('creator', $user);
        $note2->save();
        $user->link('accessedNotes', $note2);

        $note3 = new \app\models\Note();
        $note3->text = 'text3 user text3 user';
        $note3->link('creator', $user);
        $note3->save();
        $user->link('accessedNotes', $note3);
        
        $users1 = User::find()
                ->with('notes', 'accessedNotes')
                ->asArray()
                ->all();

        echo '<pre>';
        print_r($users1);
        echo '</pre>';
        echo '<hr>';
        
        $users2 = User::find()
                ->with('notes')
                ->leftJoin('note', '`note`.`creator_id` = `user`.`id`')
                ->asArray()
                ->all();

        echo '<pre>';
        print_r($users2);
        echo '</pre>';
        echo '<hr>';
        
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
