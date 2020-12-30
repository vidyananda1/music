<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Clients Management';
//$this->params['breadcrumbs'][] = $this->title;
?>
<br><br><br>
<div class="client-index">

    
        <div class="panel panel-default table-responsive"  style="box-shadow: 4px 4px 7px grey">
            <div class="panel-heading">
                <b class="text-muted">Clients Details</b>  
            </div>
            <div class="panel-body">

                 <p>
                    <?= Html::a('Add Client', ['create'], ['class' => 'btn btn-success openModal','size'=>'lg', 'header'=>'Add Client here']) ?>
                </p>

                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'tableOptions' => ['class' => 'table table-striped '],
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            // 'id',
                            'producer_name',
                            'address:ntext',
                            'phone',
                            // 'created_by',
                            //'created_date',
                            //'updated_by',
                            //'updated_date',
                            //'record_status',

                            [
                            'value' => function ($model) {
                              return Html::a('Update', ['client/update', 'id' => $model->id], ['class' => 'btn btn-md btn-warning ']);  
                                        },
                                        'format' => 'raw',
                        ],

                        // [
                        //     'value' => function ($model) {
                        //       return Html::a('Delete', ['client/delete', 'id' => $model->id],['class'=>'btn btn-md btn-danger ','data-method'=>'post','data-confirm'=>'CONFIRM DELETE?']);  
                        //                 },
                        //                 'format' => 'raw',
                        // ],

                        ],
                    ]); ?>

                
            </div>
            
        </div>
        
     

</div>
