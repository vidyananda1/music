<?php

namespace frontend\controllers;

use Yii;
use app\models\VoterAssign;
use app\models\VoterAssignSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Model;

/**
 * VoterAssignController implements the CRUD actions for VoterAssign model.
 */
class VoterAssignController extends Controller
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
     * Lists all VoterAssign models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VoterAssignSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single VoterAssign model.
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
     * Creates a new VoterAssign model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /*public function actionCreate()
    {
        $model = new VoterAssign();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }*/
     public function actionCreate($list)
    {
        $model = new VoterAssign();
        $modelsVoter = new VoterAssign();
       
        $li = json_decode($list);
        // echo "<prev>";print_r($li);die;
        if ($model->load(Yii::$app->request->post())) {
            $modelsVoter = Model::createMultiple(VoterAssign::classname());
            Model::loadMultiple($modelsVoter, Yii::$app->request->post());

            $transaction = Yii::$app->db->beginTransaction();
            try {
                foreach ($modelsVoter as  $sta) {
                    if(!empty($sta->voter_id)) {
                        $sta->agent_id = $model->agent_id;
                        if (!($flag = $sta->save(false)) ) {
                            $transaction->rollBack();
                            Yii::$app->session->setflash('danger', 'Failed to save!');
                            return $this->redirect(['voter-assign/index']);
                        }
                    }
                }
                $transaction->commit();
                Yii::$app->session->setflash('success', 'Successfully created!');
                return $this->redirect(['voter-assign/index']);
            } catch (Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setflash('danger', 'Failed to save!');
                return $this->redirect(['voter-assign/index']);
            }
        } else {
            return $this->render('_form', [
                'model' => $model,
                'modelsVoter' => $modelsVoter,
                'li' => $li
            ]);
        }
    }

    /**
     * Updates an existing VoterAssign model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            if(!$model->save()){
                Yii::$app->session->setflash('danger', 'Failed to Update!');
                return $this->redirect(Yii::$app->request->referrer);
            }else{
                Yii::$app->session->setflash('success', 'Successfully updated!');
                return $this->redirect(['voter-assign/index']);
            }
        }

        return $this->renderAjax('updated', [
            'model' => $model,
        ]);
    }
    

    /**
     * Deletes an existing VoterAssign model.
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
     * Finds the VoterAssign model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return VoterAssign the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = VoterAssign::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
