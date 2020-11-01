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

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{update} {delete}',],
        ],
    ]); ?>

</div>
</div>
