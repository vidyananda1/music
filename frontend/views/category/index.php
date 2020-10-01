<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<br><br>
<div class="category-index">

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success openModal','size'=>'md', 'header'=>'Create Category']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'cat_name',
            // 'created_date',
            // 'created_by',

            ['class' => 'yii\grid\ActionColumn',
             'template' => '{delete}'],
        ],
    ]); ?>


</div>
<?php
Modal::begin([

            'header' => '<h4>Create Category</h4>',

            'id' => 'modal',

            'size' => 'modal-md',
            'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
            


        ]);


       

        Modal::end();
         ?>
<?php $this->registerJs("$(function() {
   $('.popup').click(function(e) {
     e.preventDefault();
     $('#modal').modal('show').find('.modal-body')
     .load($(this).attr('href'));
   });

});");
