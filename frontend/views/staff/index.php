<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'Staff';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-index">

    

    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="panel panel-default " style="box-shadow: 4px 4px 7px grey">
    <div class="panel-heading">
        <b class="text-muted">Staff Management</b>
    </div>
    
    <div class="panel-body table-responsive">
    <p>
        <?= Html::a('Create Staff', ['create'], ['class' => 'btn btn-success openModal','size'=>'md', 'header'=>'Add staff here']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped '],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'staff_name',
            'address',
            'phone',
            //'created_by',
            //'created_date',
            //'record_status',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
</div>
