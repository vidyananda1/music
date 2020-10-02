<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OfferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Offers';
$this->params['breadcrumbs'][] = $this->title;
?>
<br><br>
<div class="offer-index">

    <p>
        <?= Html::a('Create Offer', ['create'], ['class' => 'btn btn-success openModal','size'=>'md', 'header'=>'Create Discount']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'dis_name',
            'dis_percent',
            // 'created_by',
            // 'created_date',
            //'record_status',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{delete}'],
        ],
    ]); ?>


</div>
