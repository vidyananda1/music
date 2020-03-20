<?php

namespace frontend\controllers;

use Yii;
use app\models\PollingBoothAssign;
use app\models\PollingBoothAssignSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Agent;

/**
 * PollingBoothAssignController implements the CRUD actions for PollingBoothAssign model.
 */
class PollingBoothAssignController extends Controller
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
     * Lists all PollingBoothAssign models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PollingBoothAssignSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('agent/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PollingBoothAssign model.
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
     * Creates a new PollingBoothAssign model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($agent_id)
    {
        $model = new PollingBoothAssign();
        $modelsPolling = [new PollingBoothAssign()];

        $agnt= Agent::find()->where(['id'=>$agent_id])->andwhere(['record_status'=>'1'])->one();
        $model->agent_id = $agnt->name;

      if ($model->load(Yii::$app->request->post())) {
            $model->agent_id = $agnt->id;
            $modelsPolling = Model::createMultiple(PollingBoothAssign::classname());
            Model::loadMultiple($modelsPolling, Yii::$app->request->post());

            $transaction = Yii::$app->db->beginTransaction();
            try {
                foreach ($modelsPolling as  $sta) {
                    if(!empty($sta->agent_id)) {
                        $sta->polling_booth_id = $model->polling_booth_id;
                        if (!($flag = $sta->save(false)) ) {
                            $transaction->rollBack();
                            Yii::$app->session->setflash('danger', 'Failed to save!');
                            return $this->redirect(['agent/index']);
                        }
                    }
                }
                $transaction->commit();
                Yii::$app->session->setflash('success', 'Successfully created!');
                return $this->redirect(['agent/index']);
            } catch (Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setflash('danger', 'Failed to save!');
                return $this->redirect(['agent/index']);
            }
        }

        return $this->renderAjax('_form', [
            'model' => $model,
            'modelsPolling' => $modelsPolling,
        ]);
    }

    /**
     * Updates an existing PollingBoothAssign model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
           if($model->save()) {
                Yii::$app->session->setFlash('success', 'Successfully Updated!');
                return $this->redirect(['agent/index']);
            } else {
                Yii::$app->session->setFlash('danger', 'Failed to Update!');
                return $this->redirect(Yii::$app->request->referrer);
            }
        }

        return $this->renderAjax('updated', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PollingBoothAssign model.
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
     * Finds the PollingBoothAssign model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PollingBoothAssign the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PollingBoothAssign::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
