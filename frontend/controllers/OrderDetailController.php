<?php

namespace frontend\controllers;

use Yii;
use app\models\OrderDetail;
use app\models\OrderItem;
use app\models\OrderDetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Model;

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
            $model->customer_id = "12345";
            $model->updated_by = 1;//Yii::$app->user->id;

            $modelitem = Model::createMultiple(OrderItem::classname());
            Model::loadMultiple($modelitem, Yii::$app->request->post());

           
            // // validate all models
            // $valid = $model->validate();
            // $valid = Model::validateMultiple($modelitem) && $valid;
            
            //if ($valid) {
                 //die('4');
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelitem as $sta) {
                            $sta->order_detail_id = $model->id;
                            $sta->updated_by = 1;//Yii::$app->user->id;
                            if (! ($flag = $sta->save(false))) {
                                //die('4');
                                $transaction->rollBack();
                                Yii::$app->session->setFlash('danger', 'Failed to Order!');
                                return $this->redirect(['order-detail/index']);
                                //break;
                            }
                        }
                    }
                    if ($flag) {
                         //die('3');
                        $transaction->commit();
                        Yii::$app->session->setFlash('success', 'Successully Ordered!');
                        return $this->redirect(['order-detail/index']);
                    }
                    // else{
                    //     die('2');
                    // }
                    
                } catch (Exception $e) {
                    die('1');
                    $transaction->rollBack();
                }
            //}
           //die('0'); 
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
