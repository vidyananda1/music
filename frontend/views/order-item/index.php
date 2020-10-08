<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Items;
use app\models\OrderDetail;
use yii\helpers\ArrayHelper;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Items';
$this->params['breadcrumbs'][] = $this->title;

$item= ArrayHelper::map(Items::find()->all(), 'id', 'name');
?>
<br><br>
<div class="order-item-index">

    

   

    <?php //echo $this->render('_search', ['model' => $searchModel]);
         $gridColumns = [
                             [
                'attribute'=>'order_detail_id',
                'value' => function ($model){
                  $ord = OrderDetail::find()->where(['id'=>$model->order_detail_id])->one();
                   return isset($ord) ? $ord->customer_id : ' ';
            
                        },
                        'format' => 'raw',
                        'label' =>'Customer ID',
                        'filter' => '',
            ],
            [
                'attribute'=>'order_detail_id',
                'value' => function ($model){
                  $ord = OrderDetail::find()->where(['id'=>$model->order_detail_id])->one();
                   return isset($ord) ? $ord->customer_name : ' ';
            
                        },
                        'format' => 'raw',
                        'label' =>'Customer Name',
                        'filter' => '',
            ],
            //'item_id',
            [
                'attribute'=>'item_id',
                'value' => function ($model){
                  $itm = Items::find()->where(['id'=>$model->item_id])->one();
                   return isset($itm) ? $itm->name : ' ';
            
                        },
                        'format' => 'raw',
                        'label' =>'Items',
                        'filter' => $item,
            ],
            //'category_id',
            'no_of_items',
            //'item_price',
            //'updated_by',
            //'updated_date',
            //'record_status',

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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'order_detail_id',
            //  [
            //     'attribute'=>'order_detail_id',
            //     'value' => function ($model){
            //       $ord = OrderDetail::find()->where(['id'=>$model->order_detail_id])->one();
            //        return isset($ord) ? $ord->customer_id : ' ';
            
            //             },
            //             'format' => 'raw',
            //             'label' =>'Customer ID',
            //             // 'filter' => '',
            // ],
             [
                'attribute' =>'customer_id',
                'value' => function($model){
                    return $model->cus->customer_id;
                },
                'label' =>'Customer ID',
                
            ],
            // [
            //     'attribute'=>'order_detail_id',
            //     'value' => function ($model){
            //       $ord = OrderDetail::find()->where(['id'=>$model->order_detail_id])->one();
            //        return isset($ord) ? $ord->customer_name : ' ';
            
            //             },
            //             'format' => 'raw',
            //             'label' =>'Customer Name',
            //             // 'filter' => '',
            // ],
             [
                'attribute' =>'customer_name',
                'value' => function($model){
                    return $model->cus->customer_name;
                },
                'label' =>'Customer Name',
                
             ],
            //'item_id',
            // [
            //     'attribute'=>'item_id',
            //     'value' => function ($model){
            //       $itm = Items::find()->where(['id'=>$model->item_id])->one();
            //        return isset($itm) ? $itm->name : ' ';
            
            //             },
            //             'format' => 'raw',
            //             'label' =>'Items',
            //             'filter' => '',
            // ],
            //'category_id',
            [
                'attribute'=> 'no_of_items',
                'filter'=>''
            ],

            [
                'attribute'=>'updated_date',
                'value'=> function ($model){
                        return date('d-m-Y',strtotime($model->updated_date));
                
                    },
                    'label'=>'Date',
                    'filter'=>'',
            ],
            
            //'item_price',
            //'updated_by',
            //'updated_date',
            //'record_status',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
