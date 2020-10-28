<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DinningTableSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dinning Tables';
$this->params['breadcrumbs'][] = $this->title;
?>
<br><br>
<div class="dinning-table-index">

    

    <p>
        <?= Html::a('Create Dinning Table', ['create'], ['class' => 'btn btn-success openModal','size'=>'md', 'header'=>'Create Dinning Table']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'table_name',
            // 'created_by',
            // 'created_date',
            // 'updated_by',
            //'updated_date',
            //'record_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
