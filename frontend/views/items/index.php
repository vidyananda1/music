<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<br><br>
<div class="items-index">

    <p>
        <?= Html::a('Create Items', ['create'], ['class' => 'btn btn-success openModal','size'=>'md', 'header'=>'Create Items']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'category',
            'quantity',
            
            [
                'attribute'=>'price',
                'filter'=>'',
            ],
            //'created_date',
            //'created_by',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{delete}'],
        ],
    ]); ?>


</div>


