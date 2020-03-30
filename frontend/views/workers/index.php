<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\ElectionType;
use app\models\Party;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $searchModel app\models\WorkersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Workers';
//$this->params['breadcrumbs'][] = $this->title;
$election= ArrayHelper::map(ElectionType::find()->all(), 'id', 'name');
$party= ArrayHelper::map(Party::find()->where(['record_status'=>"1"])->all(), 'id', 'name');
?>
 <h2 style="text-align: center">PREVIOUS ELECTION WORKERS</h2>
<div class="workers-index">

   <br><br>

    <p>
        <?= Html::a('Create Workers', ['create'], ['class' => 'btn btn-success openModal','size'=>'sm', 'header'=>'Create Agent']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="table-responsive panel panel-success">
    <div class=" panel-heading">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'election_id',
            [
                'attribute' => 'election_id',
                'value' => function($model) use($election) {
                    return $election[$model->election_id];
                },
                'filter' => $election,
                'label' => 'Election', 
            ],
            [
                'attribute' => 'party_id',
                'value' => function($model) use($party) {
                    return $party[$model->party_id];
                },
                'filter' => $party,
                'label' => 'Party', 
            ],
            //'party_id',
            [
                'attribute'=>'no_of_workers',
                'filter' => '',
            ],
            //'created_by',
            //'created_date',
            //'record_status',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{update} {delete}',
                'buttons' => [
                    'update' => function($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['class'=>'openModal', 'size'=>'sm', 'header'=>'Update Workers']);

                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, ['data' => ['confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),'method' => 'post',],
                ]);
            }
                ]
            ],
        ],
    ]); ?>


</div>
</div>
</div>
