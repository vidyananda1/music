<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TaxSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Taxes';
$this->params['breadcrumbs'][] = $this->title;
?>
<br><br>
<div class="tax-index">

    <p>
        <?= Html::a('Create Tax', ['create'], ['class' => 'btn btn-success openModal','size'=>'md', 'header'=>'Create Tax']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'tax_name',
            //'tax_percent',
            [
                'attribute'=>'tax_percent',
                'filter'=>'',
            ],
            //'created_by',
            //'created_date',
            //'record_status',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{delete}'],
        ],
    ]); ?>


</div>
