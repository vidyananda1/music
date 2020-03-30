<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\ElectionType;
use app\models\PollingBooth;
use app\models\Party;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $searchModel app\models\ResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Results';
//$this->params['breadcrumbs'][] = $this->title;
$election= ArrayHelper::map(ElectionType::find()->all(), 'id', 'name');
$poll= ArrayHelper::map(PollingBooth::find()->where(['record_status'=>"1"])->all(), 'id', 'name');
$party= ArrayHelper::map(Party::find()->where(['record_status'=>"1"])->all(), 'id', 'name');
?>
<h2 style="text-align: center;">PREVIOUS ELECTION RESULT DETAILS</h2>
<div class="result-index">

    <br><br>

    <p>
        <?= Html::a('Create Result', ['create'], ['class' => 'btn btn-success openModal','size'=>'md', 'header'=>'Create Agent']) ?>
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
            [
                'attribute' => 'election_id',
                'value' => function($model) use($election) {
                    return $election[$model->election_id];
                },
                'filter' => $election,
                'label' => 'Election', 
            ],
            [
                'attribute' => 'polling_booth_id',
                'value' => function($model) use($poll) {
                    return $poll[$model->polling_booth_id];
                },
                'label' => 'Polling-Booth',
                'filter' => Select2::widget([
                                'model' => $searchModel,
                                'attribute' => 'polling_booth_id',
                                'options' => ['prompt' => 'Select Polling-Booth ...'],
                                'pluginOptions' => ['allowClear' => true],
                                'data' => $poll,
                        ]),
            ],
            [
                'attribute' => 'party_id',
                'value' => function($model) use($party) {
                    return $party[$model->party_id];
                },
                'filter' => $party,
                'label' => 'Party', 
            ],
            [
                'attribute'=> 'no_of_votes',
                'filter' => '',
            ],
            
            //'created_by',
            //'created_date',
            //'record_status',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{update} {delete}',
                'buttons' => [
                    'update' => function($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['class'=>'openModal', 'size'=>'md', 'header'=>'Update Result']);

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
