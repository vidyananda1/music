<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use yii\helpers\ArrayHelper;
use app\models\Tax;
use app\models\Offer;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<br><br>
<div class="order-detail-index">

    

    <p>
        <?= Html::a('Update Order Detail', ['create'], ['class' => 'btn btn-success openModal','size'=>'lg', 'header'=>'Order Update']) ?>
    </p>

    <?php  echo $this->render('_search', ['model' => $searchModel]); 

    $gridColumns = [
                    'customer_name_id',
                    'customer_id',
                    'customer_phone',
                    'table_id',
                    'price',
                    'discount',
                    //'tax_id',
                    [
                        'attribute'=>'tax_id',
                        'value' => function ($model){
                            $tax = Tax::find()->where(['id'=>$model->tax_id])->one();
                            return isset($ord) ? $ord->customer_name : ' ';
            
                        },
                        'format' => 'raw',
                        'label' =>'Tax',
                        'filter' => '',
                    ],
                    'total',

    ];

    echo ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumns,
                'exportConfig' => [
                    ExportMenu::FORMAT_PDF => false,
                    ExportMenu::FORMAT_HTML => false,
                    ExportMenu::FORMAT_TEXT => false,
                    //ExportMenu::FORMAT_EXCEL => false,
                ],
            ]) 
?>
<div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'customer_name_id',
             [
                'attribute' =>'customer_name_id',
                'value' => function($model){
                    return $model->customer->cus_name;
                },
                'label' =>'Customer Name',
                
            ],
            'customer_id',
            
            'customer_phone',
            
            [
                'attribute'=>'price',
                'filter'=>'',
            ],
            [
                'attribute'=>'updated_date',
                   'value' => function ($model){
                        return date('d-m-Y',strtotime($model->updated_date));
                
                    },
                        'label'=>'Date',
                        'filter'=>'',
            ],

            //'discount',
            [
                'attribute'=>'discount',
                'value' => function ($model){
                    $offer = Offer::find()->where(['id'=>$model->discount])->one();
                    return isset($offer) ? $offer->dis_name : ' ';
            
                },
                'format' => 'raw',
                'label' =>'Discount',
                'filter' => '',
            ],
            //'tax_id',
            [
                'attribute'=>'tax_id',
                'value' => function ($model){
                    $tax = Tax::find()->where(['id'=>$model->tax_id])->one();
                    return isset($tax) ? $tax->tax_name : ' ';
            
                },
                'format' => 'raw',
                'label' =>'Tax',
                'filter' => '',
            ],
            [
                'attribute'=>'total',
                'filter'=>'',
            ],
            //'updated_by',
            //'updated_date',
            //'record_status',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
</div>
<!-- <?//= $count?"dataProvider":"No customer found" ?> -->