<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerReceiptSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customer Receipts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-receipt-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Customer Receipt', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'receipt_no',
            'customer_id',
            'created_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
