<?php

namespace frontend\controllers;

use Yii;
use app\models\PollingBooth;
use app\models\PollingBoothSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class PollingBoothController extends Controller
{
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

    public function actionIndex()
    {
        $searchModel = new PollingBoothSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['polling_booth.record_status'=>'1']);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new PollingBooth();
        $model->record_status = '1';

        if ($model->load(Yii::$app->request->post())) {
            $model->created_by = 1;//Yii::$app->user->id;
            if($model->save()) {
                Yii::$app->session->setFlash('success', 'Successfully saved!');
            } else {
                Yii::$app->session->setFlash('danger', 'Failed to save!');
            }
            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->renderAjax('_form', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->updated_by = 1;//Yii::$app->user->id;
            $model->updated_date = date('Y-m-d H:i:s');
            if($model->save()) {
                Yii::$app->session->setFlash('success', 'Successfully saved!');
            } else {
                Yii::$app->session->setFlash('danger', 'Failed to save!');
            }
            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->renderAjax('_form', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = PollingBooth::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
