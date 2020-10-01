<?php

namespace frontend\controllers;

use Yii;
use app\models\OrderDetail;
use app\models\OrderItem;
use app\models\OrderDetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderDetailController implements the CRUD actions for OrderDetail model.
 */
class OrderDetailController extends Controller
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
     * Lists all OrderDetail models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OrderDetail model.
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
     * Creates a new OrderDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OrderDetail();
        $modelitem = [new OrderItem()];

       if ($model->load(Yii::$app->request->post()) ) {
            $model->updated_by = 1;//Yii::$app->user->id;

            $modelitem = Model::createMultiple(OrderItem::classname());
            Model::loadMultiple($modelitem, Yii::$app->request->post());

            $transaction = Yii::$app->db->beginTransaction();
            try {
                foreach ($modelitem as  $sta) {
                    if(!empty($sta->order_detail_id)) {
                        $sta->order_detail_id = $model->id;
                        if (!($flag = $sta->save(false)) ) {
                            $transaction->rollBack();
                            Yii::$app->session->setflash('danger', 'Failed to save!');
                            return $this->redirect(['order-detail/index']);
                        }
                    }
                }
                $transaction->commit();
                Yii::$app->session->setflash('success', 'Successfully created!');
                return $this->redirect(['order-detail/index']);
            } catch (Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setflash('danger', 'Failed to save!');
                return $this->redirect(['order-detail/index']);
            }
        }

        return $this->renderAjax('create', [
            'model' => $model,
            'modelitem'=> $modelitem,
        ]);
    }

    /**
     * Updates an existing OrderDetail model.
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
     * Deletes an existing OrderDetail model.
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
     * Finds the OrderDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OrderDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OrderDetail::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
