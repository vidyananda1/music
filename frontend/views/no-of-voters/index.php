<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\select2\Select2;
use app\models\ElectionType;
use app\models\PollingBooth;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NoOfVotersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'No Of Voters';
//$this->params['breadcrumbs'][] = $this->title;
$election= ArrayHelper::map(ElectionType::find()->all(), 'id', 'name');
$poll= ArrayHelper::map(PollingBooth::find()->all(), 'id', 'name');
?>
 <h2 style="text-align: center"> VOTERS TURN-OUT</h2>
<div class="no-of-voters-index">

   <br><br>

    <p>
        <?= Html::a('Assign Voters', ['create'], ['class' => 'btn btn-success openModal','size' => 'md','header'=>'Create No Of Voters']) ?>
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
                'label' => 'Election'
            ],
            //'polling_booth_id',
            
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
                'attribute'=>'no_of_voters',
                'filter' => '',
            ],
            [
                'attribute'=>'no_of_turnouts',
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
