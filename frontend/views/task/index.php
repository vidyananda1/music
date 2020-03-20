<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Voter;
use app\models\Agent;
use app\models\Task;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'TASKS';
//$this->params['breadcrumbs'][] = $this->title;
?>
<br><br>
<div class="task-index">

    

    <p>
        <?= Html::a('Assign Task', ['create'], ['class' => 'btn btn-success openModal', 'size'=>'md', 'header'=>'Assign Task']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="table-responsive panel panel-success">
    <div class="panel-heading">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'voter_id',
            [
                'attribute'=>'voter_id',
                'value' => function ($model) {
                  $voter = Voter::find()->where(['id'=>$model->voter_id])->andwhere(['record_status'=>'1'])->one();
                   return isset($voter) ? $voter->name : ' ';
            
                        },
                        'format' => 'raw',
                        'label' =>'Voter Name',
                        'filter' => '',
                    ],
            [
                'attribute'=>'voter_id',
                'value' => function ($model) {
                  $voter = Voter::find()->where(['id'=>$model->voter_id])->andwhere(['record_status'=>'1'])->one();
                   return isset($voter) ? $voter->house_no : ' ';
            
                        },
                        'format' => 'raw',
                        'label' =>'House Number',
                        'filter' => '',
                    ],
            //'agent_id',
            [
                'attribute'=>'agent_id',
                'value' => function ($model) {
                  $agent = Agent::find()->where(['agent_id'=>$model->agent_id])->andwhere(['record_status'=>'1'])->one();
                   return isset($agent) ? $agent->name : ' ';
            
                        },
                        'format' => 'raw',
                        'label' =>'Agent',
                        'filter' => '',
                    ],
            //'meeting_schedule',
            [
                'attribute'=>'meeting_schedule',
                'value' => function ($model) {
                  $meeting = Task::find()->where(['meeting_schedule'=>$model->meeting_schedule])->andwhere(['record_status'=>'1'])->one();
                  $date=date('d-m-Y',strtotime($meeting->meeting_schedule));
                   return isset($meeting) ? $date : ' ';
            
                        },
                        'format' => 'raw',
                        'label' =>'Meeting Schedule',
                        'filter' => '',
                    ],
            //'actual_meeting_date',
            [
                'attribute'=>'actual_meeting_date',
                'value' => function ($model) {
                  $meeting = Task::find()->where(['actual_meeting_date'=>$model->actual_meeting_date])->andwhere(['record_status'=>'1'])->one();

                  $date=isset($meeting->actual_meeting_date) ? date('d-m-Y',strtotime($meeting->actual_meeting_date)) : 'Not Set';
                   return $date;
            
                        },
                        'format' => 'raw',
                        'label' =>'Actual Meeting Date',
                        'filter' => '',
                    ],
            [
                'attribute'=>'outcome',
                'filter'=>'',
            ],
            //'remark',
            //'created_by',
            //'created_date',
            //'updated_by',
            //'updated_date',
            //'record_status',

            [
            'value' => function ($model) {
                
                    return Html::a('Update Task', ['task/update', 'id' => $model->id], ['class' => 'btn btn-sm btn-success openModal','size'=>'md', 'header'=>'Update Task',]); 
              
                        },
                        'format' => 'raw',
                    ],
     
        ],
    ]); ?>

</div>
</div>
</div>
