<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Category;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;

$cat= ArrayHelper::map(Category::find()->all(), 'id', 'cat_name');
$quant = [ 'HALF' => 'HALF', 'FULL' => 'FULL', 'QUARTER' => 'QUARTER', 'NONE' => 'NONE'];
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
            //'category',
            [
                'attribute'=>'category',
                'value' => function ($model){
                  $category = Category::find()->where(['id'=>$model->category])->one();
                   return isset($category) ? $category->cat_name : ' ';
            
                        },
                        'format' => 'raw',
                        'label' =>'Category',
                        'filter' => $cat,
                    ],
            //'quantity',
            [
                'attribute'=>'quantity',
                'filter'=>$quant,
            ],
            
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


