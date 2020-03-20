<?php

namespace frontend\controllers;

use Yii;
use app\models\Agent;
use app\models\AgentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\PollingBoothAssign;
use app\models\PollingBoothAssignSearch;
use yii\db\Expression;
use frontend\models\SignupForm;
use common\models\User;



/**
 * AgentController implements the CRUD actions for Agent model.
 */
class AgentController extends Controller
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
     * Lists all Agent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AgentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['agent.record_status'=>'1']);
        
        $pollingModel = new PollingBoothAssignSearch();
        $dataProv = $pollingModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'pollingModel' =>$pollingModel,
            'dataProv' =>$dataProv, 
        ]);
    }

    /**
     * Displays a single Agent model.
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
     * Creates a new Agent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Agent();
        $user = new SignupForm();

        $connection = Yii::$app->db;
        $transaction = $connection->beginTransaction();

        try{

        if ($model->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post())) {
            $model->name= strtoupper($model->name);
            $model->created_by = 1;//Yii::$app->user->id;

           if ($flag = $model->save()) {
                    if($model->agent_type==1){
                        $user->user_type=1;
                    }elseif($model->agent_type==2){
                        $user->user_type=2;
                    }elseif($model->agent_type==3){
                        $user->user_type=3;
                    }
                    $flag1 = $user->signup();
                    
                }
                

            if ($flag1) {
                    $agent = User::find()->select('id')->where(['username'=>$user->username])->one();
                    
                    Yii::$app->authManager->revokeAll($agent->id);

                    if($model->agent_type == 1)
                        $role = "admin";
                    else if($model->agent_type == 2)
                        $role = "agent";
                    else if($model->agent_type == 3)
                        $role = "subagent";

                    $auth = Yii::$app->authManager;
                   
                    if(!$authorRole = $auth->getRole($model->role)) {
                        Yii::$app->session->setFlash('warning', 'New user was created. But there was a problem assigning role. Please contact Developer.');
                        return $this->redirect(Yii::$app->request->referrer);
                    }
                    $auth->assign($authorRole, $agent->id);

                    $transaction->commit();
                    Yii::$app->session->setFlash('success', 'Successfully Saved!');
                    return $this->redirect(['index']);
                } else {
                    $transaction->rollBack();
                    //echo "<pre>";print_r($model->errors);echo "</pre>";die();
                    Yii::$app->session->setFlash('danger', 'Failed to Saved');
                    return $this->redirect(Yii::$app->request->referrer);
                }
            
        
    }
    }catch (\Exception $e){
        $transaction->rollBack();
        throw $e;
        }

        return $this->renderAjax('create', [
            'model' => $model,
            'user' =>(empty($user)) ? [new SignupForm] : $user,
            'create'=>0,
        ]);
    
}

    /**
     * Updates an existing Agent model.
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

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Agent model.
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
     * Finds the Agent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Agent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Agent::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
