<?php

namespace frontend\controllers;

use Yii;
use app\models\Voter;
use app\models\VoterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VoterController implements the CRUD actions for Voter model.
 */
class VoterController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Voter models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VoterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAssign()
    {

        if($selection=(array)Yii::$app->request->post('selection'))
        {
            if(Yii::$app->request->post()) {
                $list= Voter::find()->asArray()->select('id,name,house_no')->where(['id'=>$selection])->all();
                //echo "<pre>";print_r($list);die;
                if($_POST['submit'] == 'voterassign') {
                    return $this->redirect(['voter-assign/create','list' => json_encode($list)]);
                }
                else{
                     return $this->redirect(['voter/create']);
                }
                
            }
            
        }
        else
        {

            Yii::$app->session->setFlash('danger', "Your have not selected any row");
            return $this->redirect(['voter/index']);
        }

       
    }

    /**
     * Displays a single Voter model.
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
     * Creates a new Voter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Voter();

        if ($model->load(Yii::$app->request->post())) {
            $model->name= strtoupper($model->name);
            $model->address= strtoupper($model->address);
            $model->interest= strtoupper($model->interest);
            $model->created_by = 1;//Yii::$app->user->id;
            if(!$model->save()){
                Yii::$app->session->setFlash('danger', 'Failed to save!');
                return $this->redirect(Yii::$app->request->referrer);
            }else{
                Yii::$app->session->setFlash('success', 'Successfully saved!');
                return $this->redirect(['index']);
            }
        }

        return $this->renderAjax('_form', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Voter model.
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

        return $this->renderAjax('_form', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Voter model.
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
     * Finds the Voter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Voter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Voter::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
