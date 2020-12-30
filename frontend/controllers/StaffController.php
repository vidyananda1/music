<?php

namespace frontend\controllers;

use Yii;
use app\models\Staff;
use app\models\StaffSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\rbac\DbManager;
use kartik\form\ActiveForm;
/**
 * StaffController implements the CRUD actions for Staff model.
 */
class StaffController extends Controller
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
     * Lists all Staff models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StaffSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Staff model.
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
     * Creates a new Staff model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Staff();
        if ( Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) ) {
            // die;
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) ) {
            $transaction = Yii::$app->db->beginTransaction();
            $user_id = $model->signup();
            if(!$user_id){
                // Yii::$app->session->set('toast', 'Failed to create user');
                Yii::$app->session->setFlash('danger', 'Failed to create user');

            }
            else {
                $auth = new DbManager;
                $auth->init();
                $role = $auth->getRole($model->name);
                // echo $model->name;
                // echo "<pre>";
                // print_r($role);
                // echo "</pre>";
                // die;
                $auth->assign($role, $user_id);
                $model->user_id = $user_id;
                $model->created_by = Yii::$app->user->id;
                if($model->save(false)) {
                    $transaction->commit();
                    Yii::$app->session->setFlash('success', 'User created Successfully !!');
                }
                else{
                    Yii::$app->session->setFlash("danger","Failed to create user, some error has occured");
                    $transaction->rollback();
                    print_r($model->errors);die;
                }
                return $this->redirect(['staff/index']);
            } 
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Staff model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ( Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) ) {
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {
            $auth = new DbManager;
                $auth->init();
                $role = $auth->getRole($model->name);
                
                $user_id = $model->user_id;
                $auth->assign($role, $user_id);
            if(!$model->save()) {
                print_r($model->errors);
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionResetpassword($id){
        $staff = $this->findModel($id);
        $user = \common\models\User::findOne($staff->user_id);
        if ($staff->load(Yii::$app->request->post()) ) {
            $user->setPassword($staff->password);
            $user->save();
            Yii::$app->session->setFlash("success","Password reset successfully");
            return $this->redirect(['staff/index']);
        }
        return $this->render('_resetPassword', [
            'model' => $staff,
        ]);
        
    }

    /**
     * Deletes an existing Staff model.
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
     * Finds the Staff model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Staff the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Staff::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
