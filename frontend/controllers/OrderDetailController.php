<?php

namespace frontend\controllers;

use Yii;
use app\models\OrderDetail;
use app\models\OrderItem;
use app\models\Items;
use app\models\Offer;
use app\models\Tax;
use app\models\OrderDetailSearch;
use app\models\CustomerReceipt;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Model;
use yii\helpers\ArrayHelper;

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
        $taxes = ArrayHelper::map(Tax::find()->all(), "id","tax_percent");
       
       if ($model->load(Yii::$app->request->post()) ) {
            $customer_id = "CUS".$this->randomNoGenerator(4);
            $model->customer_id = $customer_id;
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


                        $receipt = new CustomerReceipt();
                        $receipt->order_detail_id = $model->id;
                        $receipt->customer_id = $customer_id;
                        $receipt->receipt_no = "NK".$this->randomNoGenerator(4);
                        if(!$receipt->save(false)) {
                            $flag = 0;
                            // print_r($receipt->errors);
                            // die;
                        }
                    }
                    if ($flag) {
                         //die('3');
                         //To do: add custromer Id (random number CUS1234),add recipt number(rand NK1234)  add to customer receipt table
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

    public function actionAmount() {
        //TO DO : test if discounts and taxes work properly for multiple orders
        $itemPrice = ArrayHelper::map(Items::find()->all(), "id","price");
        $offers = ArrayHelper::map(Offer::find()->all(), "id","dis_percent");
        $taxes = ArrayHelper::map(Tax::find()->all(), "id","tax_percent");
        $sum = 0;
        $amount = 0;
        if($data = Yii::$app->request->post()) {
            $data = Yii::$app->request->post();
            foreach($data["arr"] as $key=>$value){
                $sum = $sum + $value["itemCount"]*$itemPrice[$value["itemId"]];
                // foreach($value as $key1=>$value1){
                //    echo $value1["itemCount"];
                // }
            }
            // die;
            $amount = $sum;
            if($data["discount"]) {
                $discount = $offers[$data["discount"]];
                // echo "<pre>";print_r($offers);echo "</pre>";die;
                // return $discount;
                $amount= ($sum*(100-$discount))/100;
            }
            if($data["tax"]) {
                $tax = ($taxes[$data["tax"]]*$amount)/100;
                // echo "<pre>";print_r($offers);echo "</pre>";die;
                // return $discount;
                $amount= $amount+$tax;
            }
            

            return json_encode(["amount"=>$amount,"sum"=>$sum]) ;
        }
        else {
            return "data not sent";
        }
    }
    public function randomNoGenerator($digits) {
        return rand(pow(10, $digits-1), pow(10, $digits)-1);
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