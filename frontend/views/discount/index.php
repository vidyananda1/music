<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DiscountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'Discounts';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="discount-index">

    <div class="panel panel-default" style="box-shadow: 4px 4px 7px grey">
        <div class="panel-heading">
            <b class="text-muted">Offer details</b>
        </div>
        <div class="panel-body">
            <p>
                <?= Html::a('Create Discount', ['create'], ['class' => 'btn btn-success openModal','size'=>'md', 'header'=>'Create Discount Here']) ?>
            </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        //'id',
                        //'name',
                        [
                            'attribute'=>'name',
                            'label'=>'Discount Name',
                        ],
                        
                        [
                            'attribute'=>'dis_percent',
                            'label'=>'Discount Percentage ( % )',
                        ],
                        // 'created_by',
                        // 'created_date',
                        //'record_status',

                        ['class' => 'yii\grid\ActionColumn',
                            'template'=> '{update}'],
                    ],
                ]); ?>
            
        </div>
        
    </div>

</div>
