<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ElectionTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Election Types';
//$this->params['breadcrumbs'][] = $this->title;
?>
<h2 style="text-align: center;">ELECTION TYPES</h2>
<br><br>
<div class="election-type-index">

    

    <p>
        <?= Html::a('Create Election Type', ['create'], ['class' => 'btn btn-success openModal','size'=>'sm','header'=>'CREATE ELECTION TYPE']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="table-responsive panel panel-success">
        <div class=" panel-heading">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            //'record_status',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',
                'buttons' => [
                    'update' => function($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['class'=>'openModal', 'size'=>'sm', 'header'=>'Update Polling Booth']);

                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, ['data' => ['confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),'method' => 'post',],
                ]);
            }
                ]
            ],
        ],
    ]); ?>


</div>
</div>
</div>
