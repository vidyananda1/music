<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Order Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'order_detail_id',
            'item_id',
            'category_id',
            'no_of_items',
            //'item_price',
            //'updated_by',
            //'updated_date',
            //'record_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
