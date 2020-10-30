<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\OrderDetail;
use app\models\Customer;


/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerReceiptSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customer Receipts';
$this->params['breadcrumbs'][] = $this->title;
?>
<br><br>
<div class="customer-receipt-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'receipt_no',
            'customer_id',
            [
                'attribute'=> 'customer_id',
                'value' => function ($model){
                  $cus_id = OrderDetail::find()->where(['customer_id'=>$model->customer_id])->one();
                  $name = Customer::find()->where(['id'=>$cus_id->customer_name_id])->one();
                   return isset($name) ? $name->cus_name : ' ';
            
                        },
                        'format' => 'raw',
                        'label' =>'Customer Name',
                        'filter' => '',
            ],
            //'created_date',

            [
                'attribute'=>'created_date',
                   'value' => function ($model){
                        return date('d-m-Y',strtotime($model->created_date));
                
                    },
                        'label'=>'Date',
                        'filter'=>'',
            ],

            //['class' => 'yii\grid\ActionColumn'],
            [
            'value' => function ($model) {
              return Html::a('Print', ['customer-receipt/print', 'order_detail_id' => $model->order_detail_id], ['class' => 'btn btn-sm btn-danger ','target'=>'_blank']);  
                        },
                        'format' => 'raw',
                    ],
        ],
    ]); ?>


</div>
