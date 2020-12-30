<?php

namespace frontend\controllers;

use Yii;
use app\models\Registration;
use app\models\RegistrationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RegistrationController implements the CRUD actions for Registration model.
 */
class RegistrationController extends Controller
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
     * Lists all Registration models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RegistrationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['record_status'=>'1']);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Registration model.
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
     * Creates a new Registration model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Registration();

         if ($model->load(Yii::$app->request->post()) ) {
            //$reg_id = "GA".$this->randomNoGenerator(4);
            //$model->registration_id = $reg_id;
            $model->created_by = Yii::$app->user->id;

            $registrationid = Registration::find()->orderBy(['id' => SORT_DESC])->one();
            // $category = Category::findOne($model->category);
            $num = 0;

            if(!empty($registrationid))
            {
                $num = sprintf("%06d",$registrationid->id + 1);
                $regid = 'GA'.$num;
                
            }
            else
            {
                $num = sprintf("%06d",1);
                $regid = 'GA'.$num;
                
            }
            $model->registration_id = $regid;
            if(!$model->save()){
                print_r($model->errors);die;
                Yii::$app->session->setFlash('danger', 'Failed to Register !');
                return $this->redirect(Yii::$app->request->referrer);
            }else{

                Yii::$app->session->setFlash('success', 'Registration  Successful!');
                return $this->redirect(['index']);
            }
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    public function actionPrint($id)
    {
        $model = new Registration();
        $details = Registration::find()->where(["id"=>$id])->one();
        
        // if ($model->load(Yii::$app->request->post()) ) {
        //    // return $this->redirect(['view', 'id' => $model->id]);
        // }
        

        return $this->renderAjax('print', [
            'model' => $model,
            'details'=>$details
        ]);
    }
    /**
     * Updates an existing Registration model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            //$reg_id = "GA".$this->randomNoGenerator(4);
            //$model->registration_id = $reg_id;
            $model->updated_by = Yii::$app->user->id;
            $model->updated_date = date('h:i:s');

            if(!$model->save()){
                print_r($model->errors);die;
                Yii::$app->session->setFlash('danger', 'Failed to Update !');
                return $this->redirect(Yii::$app->request->referrer);
            }else{

                Yii::$app->session->setFlash('success', 'Update  Successful!');
                return $this->redirect(['index']);
            }
        }

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Registration model.
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
     * Finds the Registration model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Registration the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Registration::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
