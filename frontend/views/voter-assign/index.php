<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Voter;
use app\models\Agent;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $searchModel app\models\VoterAssignSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->params['breadcrumbs'][] = $this->title;

$voter= ArrayHelper::map(Voter::find()->where(['record_status'=>"1"])->all(), 'id', 'name');
$agent= ArrayHelper::map(Agent::find()->where(['record_status'=>"1"])->all(), 'id', 'name');

?>
<h2 style="text-align:center"> VOTERS ASSIGN TO AGENTS</h2>
<br><br>
<div class="voter-assign-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="table-responsive  panel-success">
    <div class=" panel-heading">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'voter_id',
            [
                'attribute' => 'agent_id',
                'value' => function($model) use($agent) {
                    return $agent[$model->agent_id];
                },
                'label' => 'Agent',
                'filter' => Select2::widget([
                                'model' => $searchModel,
                                'attribute' => 'agent_id',
                                'options' => ['prompt' => 'Select Agent ...'],
                                'pluginOptions' => ['allowClear' => true],
                                'data' => $agent,
                        ]),
            ],
            [
                'attribute' => 'voter_id',
                'value' => function($model) use($voter) {
                    return $voter[$model->voter_id];
                },
                'label' =>'Voter',
                'filter' =>  Select2::widget([
                                'model' => $searchModel,
                                'attribute' => 'voter_id',
                                'options' => ['prompt' => 'Select Voter ...'],
                                'pluginOptions' => ['allowClear' => true],
                                'data' => $voter,
                        ]),
            ],
            
            //'agent_id',
            //'record_status',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{update}',
                'buttons' => [
                    'update' => function($url, $model) {
                        return Html::a('<i class="fa fa-pencil"><i>', $url, ['class'=>'openModal', 'size'=>'sm', 'header'=>'Update Voter assign']);
                    }
                ]
            ],
                
        ],
    ]); ?>


</div>
</div>
</div>

