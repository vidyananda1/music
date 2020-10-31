<?php

namespace frontend\controllers;

use app\models\OrderDetail;
use app\models\StockIn;
use app\models\Report;
use Yii;
use app\models\Tax;
use app\models\TaxSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TaxController implements the CRUD actions for Tax model.
 */
class ReportController extends Controller
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
     * Lists all Tax models.
     * @return mixed
     */
    public function actionIndex()
    {
     
        $model = new Report();
       
        $startDate = '';
        $endDate = '';
        if($model->load(Yii::$app->request->queryParams)) {
            $startDate = $model->start_date;
            $endDate  = $model->end_date;
            $incomes = OrderDetail::find()->leftJoin('customer','customer.id=order_detail.customer_name_id')->select('order_detail.updated_date,total,cus_name')->asArray()->where(['between','date(order_detail.updated_date)',$startDate,$endDate])->groupBy('order_detail.updated_date,customer_name_id')->all();
            $sumIncome = OrderDetail::find()->select('SUM(total) as total')->asArray()->where(['between','date(updated_date)',$startDate,$endDate])->all();
            $epenses = StockIn::find()->select('item_name,price,date')->where(['between','date(date)',$startDate,$endDate])->andWhere(['record_status'=>1])->all();
            $sumExpenses = StockIn::find()->select('SUM(price) as total')->asArray()->where(['between','date(date)',$startDate,$endDate])->andWhere(['record_status'=>1])->all();
            // print_r($sumIncome[0]['total']);die;
            return $this->render('index', [
                // 'searchModel' => $searchModel,
                // 'dataProvider' => $dataProvider,
                'incomes' => $incomes,
                'expenses'=>$epenses,
                'sumIncome' => $sumIncome[0]['total'],
                'sumExpenses' => $sumExpenses[0]['total'],
                'model' => $model,
            ]);
        }
        return $this->render('_form',['model'=>$model]);
       
    }

    /**
     * Displays a single Tax model.
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
     * Creates a new Tax model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tax();

         if ($model->load(Yii::$app->request->post()) ) {
            $model->tax_name = strtoupper($model->tax_name);
            $model->created_by = 1;//Yii::$app->user->id;
            if(!$model->save()){
                print_r($model->errors);die;
                Yii::$app->session->setFlash('danger', 'Failed to Add Tax!');
                return $this->redirect(Yii::$app->request->referrer);
            }else{
                Yii::$app->session->setFlash('success', 'Tax Successfully Added!');
                return $this->redirect(['index']);
            }
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tax model.
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
     * Deletes an existing Tax model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
       $model = $this->findModel($id);
       $model->record_status='0';
       $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tax model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tax the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tax::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
