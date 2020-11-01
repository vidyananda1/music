<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<br><br>
<div class="customer-index">

   
    <p>
        <?= Html::a('Create Customer', ['create'], ['class' => 'btn btn-success openModal','size'=>'md', 'header'=>'Customer Entry']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class=" table table-responsive">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'cus_name',
            'address',
            'phone',
            //'created_by',
            //'created_date',
            //'record_status',

            // ['class' => 'yii\grid\ActionColumn',
            //     'template'=>'{update} {delete}',],
             [
            'value' => function ($model) {
              return Html::a('Update', ['customer/update', 'id' => $model->id], ['class' => 'btn btn-sm btn-success ']);  
                        },
                        'format' => 'raw',
                    ],

            //['class' => 'yii\grid\ActionColumn','template' => '{update}{delete}',],

           [
            'value' => function ($model) {
              return Html::a('Delete', ['customer/delete', 'id' => $model->id], ['class' => 'btn btn-sm btn-danger ','data-method'=>'post', 'data-confirm'=>'ARE YOU SURE TO DELETE ?']);  
                        },
                        'format' => 'raw',
                    ],
        ],
    ]); ?>

</div>
</div>
