<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\OrderDetail;


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
                  $name = OrderDetail::find()->where(['customer_id'=>$model->customer_id])->one();
                   return isset($name) ? $name->customer_name : ' ';
            
                        },
                        'format' => 'raw',
                        'label' =>'Customer Name',
                        'filter' => '',
            ],
            //'created_date',

            //['class' => 'yii\grid\ActionColumn'],
            [
            'value' => function ($model) {
              return Html::a('Print', ['customer-receipt/print', 'print_id' => $model->order_detail_id], ['class' => 'btn btn-sm btn-danger ','target'=>'_blank']);  
                        },
                        'format' => 'raw',
                    ],
        ],
    ]); ?>


</div>
