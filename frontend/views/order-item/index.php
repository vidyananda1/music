<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Items;
use app\models\Category;
use app\models\OrderDetail;
use yii\helpers\ArrayHelper;
use kartik\export\ExportMenu;
use app\models\Customer;
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
            //                  [
            //     'attribute'=>'order_detail_id',
            //     'value' => function ($model){
            //       $ord = OrderDetail::find()->where(['id'=>$model->order_detail_id])->one();
            //        return isset($ord) ? $ord->customer_id : ' ';
            
            //             },
            //             'format' => 'raw',
            //             'label' =>'Customer ID',
            //             'filter' => '',
            // ],
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
            //'no_of_items',
            [
                'attribute'=>'no_of_items',
                'label'=>'Quantity',

            ],
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
    <div class="table table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

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
             // [
             //    'attribute' =>'customer_name',
             //    'value' => function($model){
             //        return $model->cus->customer_name;
             //    },
             //    'label' =>'Customer Name',
                
             // ],
              [
                //'attribute'=>'item_id',
                'value' => function ($model){
                  $ord = OrderDetail::find()->where(['id'=>$model->order_detail_id])->one();
                  $cus_name = Customer::find()->where(['id'=>$ord->customer_name_id])->one();
                   return isset($cus_name) ? $cus_name->cus_name : ' ';
            
                        },
                        'format' => 'raw',
                        'label' =>'Customer',
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
                        'filter' => '',
            ],
            //'category_id',
            [
                'attribute'=>'item_id',
                'value' => function ($model){
                  $itm = Items::find()->where(['id'=>$model->item_id])->one();
                  $cat = Category::find()->where(['id'=>$itm->category])->one();
                   return isset($cat) ? $cat->cat_name : ' ';
            
                        },
                        'format' => 'raw',
                        'label' =>'Category',
                        'filter' => '',
            ],
            [
                'attribute'=> 'no_of_items',
                'label'=>'Quantity',
                'filter'=>''
            ],
            [
                'attribute'=> 'status',
                //'label'=>'Quantity',
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

             [
                             // 'attribute' => 'approval',
                            'label' =>'Approval',
                            'format' => 'raw',
                            'value' => function ($model)
                             {
                                //$apply= ApplyStatus::find()->where(['apply_id'=>$model->id])->one();
                                //$approve = ApprovalStatus::find()->where(['id'=>$apply->approval_status_id])->one();
                                //check this part
                                if($model->status == "PENDING")
                                {
                                       return Html::a('Pending', ['order-item/approval', 'id' => $model->id], ['class' => 'btn 
                                        btn-sm btn-warning openModal', 'style' => 'padding: 6px 20px 6px 20px;','size'=>'sm', 'header'=>'Set Approval']); 
                                    
                                }
                                else if($model->status=="IN-PROCESS")
                                {

                                    return Html::a('In-Process',['order-item/approval','id' => $model->id], ['class' => 'btn btn-sm btn-success openModal', 'style' => 'padding: 6px 20px 6px 20px;','size'=>'sm', 'header'=>'Set Approval']);  
                                }
                                 else if($model->status=="COMPLETED")
                                {

                                    return Html::a('Completed', ['order-item/approval', 'id' => $model->id], ['class' => 'btn 
                                        btn-sm btn-danger openModal', 'style' => 'padding: 6px 20px 6px 20px;','size'=>'sm', 'header'=>'Set Approval']);  
                                }
                                 else if($model->status=="DELIVERED")
                                {

                                    return Html::a('Delivered', ['order-item/approval', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary openModal', 'style' => 'padding: 6px 20px 6px 20px;','size'=>'sm', 'header'=>'Set Approval']);  
                                }
                                
                                               
                            },
                        ],
        ],
    ]); ?>

</div>
</div>
