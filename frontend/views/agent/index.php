<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Agent;
use app\models\PollingBooth;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AgentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->params['breadcrumbs'][] = $this->title;
$agent=['1'=>'Admin','2'=>'Agent','3'=>'Sub-Agent'];
?>
<div style="border-top: solid 1px;border-bottom: solid 1px;text-align: center;"><h3><b>USERS</b></h3></div>
<br><br>
<div class="agent-index">

    

    <p>
        <?= Html::a('Create Users', ['create'], ['class' => 'btn btn-success openModal','size'=>'md', 'header'=>'Create Agent']) ?>
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
            'name',
            //'phone',
            //'agent_type',
             [
                'attribute' => 'agent_type',
                'value' => function($model) use($agent) {
                    return $agent[$model->agent_type];
                },
                'filter' => $agent,
                'label' => 'User-Type', 
            ],
            //'agent_id',
            [
                'attribute' => 'phone',
                'filter' => '',
            ], 
            [
                'attribute' => 'agent_id',
                'value' => function ($model) {
                  $agent = Agent::find()->where(['id'=>$model->agent_id])->andwhere(['record_status'=>'1'])->one();
                   return isset($agent) ? $agent->name : ' ';
            
                        },
                        'format' => 'raw',
                        'label' =>'Agent',
                        'filter' => '',
                    ],
            //'created_date',
            //'created_by',
            //'record_status',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update}',
                'buttons' => [
                    'update' => function($url, $model) {
                        return Html::a('<i class="fa fa-pencil"><i>', $url, ['class'=>'openModal', 'size'=>'md', 'header'=>'Update Polling Booth']);
                    }
                ]
            ],
            [
            'value' => function ($model) {
                
                    return Html::a('Assign Polling-Booth', ['polling-booth-assign/create', 'agent_id' => $model->id], ['class' => 'btn btn-sm btn-success openModal','size'=>'md', 'header'=>'Assign Polling-Booth',]); 
              
                        },
                        'format' => 'raw',
                    ],
        ],
    ]); ?>


</div>
</div>
</div>
<br><br>
<div style="border-bottom: solid 1px;"></div> 
    <h3 style="text-align: center;">POLLING-BOOTHS ASSIGNED TO AGENTS / SUB-AGENTS</h3>
<div style="border-bottom: solid 1px;"></div>
<br>
<div class="table-responsive panel panel-success">
    <div class=" panel-heading">

    <?= GridView::widget([
        'dataProvider' => $dataProv,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'agent_id',
            [
                'attribute'=>'agent_id',
                'value' => function ($model) {
                  $agent = Agent::find()->where(['id'=>$model->agent_id])->andwhere(['record_status'=>'1'])->one();
                   return isset($agent) ? $agent->name : ' ';
            
                        },
                        'format' => 'raw',
                        'label' =>'Agent',
                    ],
            [
                'attribute'=>'polling_booth_id',
                'value' => function ($model) {
                  $poll = PollingBooth::find()->where(['id'=>$model->polling_booth_id])->andwhere(['record_status'=>'1'])->one();
                   return isset($poll) ? $poll->name : ' ';
            
                        },
                        'format' => 'raw',
                        'label' =>'Polling Booth',
                    ],
            [
            'value' => function ($model) {
                
                    return Html::a('Update', ['polling-booth-assign/update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary openModal','size'=>'sm', 'header'=>'Assign Polling-Booth',]); 
              
                        },
                        'format' => 'raw',
                    ],

            //'polling_booth_id',
            //'record_status',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>