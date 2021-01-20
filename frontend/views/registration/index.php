<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Client;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RegistrationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'Registrations';
// $this->params['breadcrumbs'][] = $this->title;

$client= ArrayHelper::map(Client::find()->all(), 'id', 'producer_name');
$pay=[ 'FULL PAYMENT' => 'FULL PAYMENT', 'PARTIAL PAYMENT' => 'PARTIAL PAYMENT', 'NOT PAID' => 'NOT PAID' ];
$deliver=[ 'DELIVERED' => 'DELIVERED', 'PENDING' => 'PENDING', 'UNDER PROCESS' => 'UNDER PROCESS', 'DEAL CANCEL' => 'DEAL CANCEL'];
?>
<div class="registration-index">

     <?php  

    $gridColumns = [
            [
                'attribute'=>'registration_id',
                'label'=>'ID',
            ],
            
            [
                'attribute'=>'producer_name_id',
                'value' => function ($model) use($client) {
                        return isset($model->producer_name_id) ? $client[$model->producer_name_id] : ' ';
                    },
                'label'=>'Producer Name',
            ],
            
            [
                'attribute'=>'date',
                'value' => function ($model) {
                        return isset($model->date) ? date('d-m-Y',strtotime($model->date)) : ' ';
                    },
                'filter'=>DatePicker::widget([
                'model' => $searchModel,
                'attribute'=>'date',
                'clientOptions' => [
                    'todayHighlight' => true,
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                    ]
                ])       
            ],
           
            [
                'attribute'=> 'no_of_songs',
                'filter'=>'',
            ],
            
            'price_per_song',
            [
                'attribute'=>  'to_be_paid',
                'label'=>'Net Amount',
                'filter'=>'',
            ],
           
            
            [
                'attribute'=>  'discount',
                'label'=>'Discount',
                'filter'=>'',
            ],
            'discount_amount',
            
            [
                'attribute'=> 'total_amount',
                'label'=>'Total Amount',
                'filter'=>'',
            ],
            
            [
                'attribute'=> 'payment_status',
                'filter'=>$pay,
            ],

            [
                'attribute'=> 'delivery_status',
                'filter'=>$deliver,
            ],
            
            
            [
                'attribute'=> 'cancel_reason',
                'filter'=>'',
            ],
            
            [
                'attribute'=> 'refund_amount',
                'filter'=>'',
            ],

    ];

   
?>

   <div class="panel panel-default " style="box-shadow: 4px 4px 7px grey">
    <div class="panel-heading">
        <b>Registration Details</b>
        <p>
            <?php
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
        </p>
    </div>
    <div class="panel-body table-responsive ">
        <p>
        <?= Html::a('Create Registration', ['create'], ['class' => 'btn btn-success openModal','size'=>'lg', 'header'=>'Enter Registration Details here']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped '],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            
            [
                'attribute'=>'registration_id',
                'label'=>'ID',
            ],
            
            [
                'attribute'=>'producer_name_id',
                'value' => function ($model) use($client) {
                        return isset($model->producer_name_id) ? $client[$model->producer_name_id] : ' ';
                    },
                'label'=>'Producer Name',
            ],
            
            [
                'attribute'=>'date',
                'value' => function ($model) {
                        return isset($model->date) ? date('d-m-Y',strtotime($model->date)) : ' ';
                    },
                'filter'=>DatePicker::widget([
                'model' => $searchModel,
                'attribute'=>'date',
                'clientOptions' => [
                    'todayHighlight' => true,
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                    ]
                ])       
            ],
            
            [
                'attribute'=> 'singer_name',
                'filter'=>'',
            ],
           
            [
                'attribute'=> 'no_of_songs',
                'label'=>'No of songs',
                'filter'=>'',
            ],
            
            //'price_per_song',
            // [
            //     'attribute'=>  'to_be_paid',
            //     'label'=>'Net Amount',
            //     'filter'=>'',
            // ],
           
            
            // [
            //     'attribute'=>  'discount',
            //     'label'=>'Discount',
            //     'filter'=>'',
            // ],
            //'discount_amount',
            
            [
                'attribute'=> 'total_amount',
                'label'=>'Total Amount',
                'filter'=>'',
            ],
            [
                'attribute'=> 'paid_amount',
                'label'=>'Amount Paid',
                'filter'=>'',
            ],
            [
                'attribute'=> 'balance_amount',
                'label'=>'Due Amount',
                'filter'=>'',
            ],
            
            // [
            //     'attribute'=> 'payment_status',
            //     'filter'=>$pay,
            // ],

            // [
            //     'attribute'=> 'delivery_status',
            //     'filter'=>$deliver,
            // ],
             [
                        'attribute'=>'payment_status',
                        'contentOptions' => function ($model) {
                            if($model->payment_status == "FULL PAYMENT"){
                                return ['class'=>'label label-success','style' => 'font-style:oblique;font-size:9px;border-radius:50px 20px;box-shadow:2px 2px 4px gray'];
                            }elseif($model->payment_status == "PARTIAL PAYMENT"){
                                return ['class'=>'label label-info','style' => 'font-style:oblique;font-size:9px;border-radius:50px 20px;box-shadow:2px 2px 4px gray'];
                            }
                            else{
                                 return ['class'=>'label label-danger','style' => 'font-style:oblique;font-size:9px;border-radius:50px 20px;box-shadow:2px 2px 4px gray'];
                            }

                        },
                        'label'=>'Payment Status',
                        'filter'=>$pay,
                    ],
            [
                        'attribute'=>'delivery_status',
                        'contentOptions' => function ($model) {
                            if($model->delivery_status == "DELIVERED"){
                                return ['style' => 'color:green;font-weight:bold;background-color:#ccfcd2'];
                            }elseif($model->delivery_status == "UNDER PROCESS"){
                                 return ['style' => 'color:#959912;font-weight:bold;background-color:#f8fabb'];
                                
                            }elseif($model->delivery_status == "PENDING"){
                                return ['style' => 'color:#1e6575;font-weight:bold;background-color:#dcf6fc'];
                                 
                            }else{
                                return ['style' => 'color:red;font-weight:bold;background-color:#ffe9e0'];
                            }

                        },
                        'label'=>'Song Status',
                        'filter'=>$deliver,
                    ],
            
            [
                'attribute'=> 'cancel_reason',
                'filter'=>'',
            ],
            
            [
                'attribute'=> 'refund_amount',
                'filter'=>'',
            ],
            //'created_by',
            //'created_date',
            //'updated_by',
            //'updated_date',
            //'record_status',

             [
                'value' => function ($model) {
                  return Html::a('Print', ['registration/print', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary','target'=>'_blank']);  
                            },
                            'format' => 'raw',
            ],
            [
                'value' => function ($model) {
                  return Html::a('Update', ['registration/update', 'id' => $model->id], ['class' => 'btn btn-sm btn-warning openModal','size'=>'lg', 'header'=>'Update Your Order Here']);  
                            },
                            'format' => 'raw',
            ],
        ],
    ]); ?>
    </div>
       
   </div>
    


</div>
