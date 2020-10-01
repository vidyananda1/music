<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<br><br>
<div class="order-detail-index">

    

    <p>
        <?= Html::a('Update Order Detail', ['create'], ['class' => 'btn btn-success openModal','size'=>'lg', 'header'=>'Order Update']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'customer_name',
            'customer_id',
            'customer_address:ntext',
            'customer_phone',
            'price',
            'discount',
            'tax_id',
            'total',
            //'updated_by',
            //'updated_date',
            //'record_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
