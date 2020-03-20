<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SocialStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'SOCIAL STATUS';
//$this->params['breadcrumbs'][] = $this->title;
$status=['1'=>'Active','0'=>'Inactive'];
?>
<br><br>
<div class="social-status-index">



    <p>
        <?= Html::a('Create Social Status', ['create'], ['class' => 'btn btn-success openModal','size'=>'md', 'header'=>'Create Social-Status']) ?>
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
            [
                'attribute' => 'record_status',
                'value' => function($model) use($status) {
                    return $status[$model->record_status];
                },
                'filter' => $status,
                'label' => 'Status', 
            ],

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{update}',],
        ],
    ]); ?>


</div>
</div>
</div>
