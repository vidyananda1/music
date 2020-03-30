<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\PollingBooth;
use app\models\SocialStatus;
use app\models\Party;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\VoterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->params['breadcrumbs'][] = $this->title;
$stat= ArrayHelper::map(SocialStatus::find()->where(['record_status'=>"1"])->all(), 'id', 'name');
$poll= ArrayHelper::map(PollingBooth::find()->where(['record_status'=>"1"])->all(), 'id', 'name');
$part= ArrayHelper::map(Party::find()->where(['record_status'=>"1"])->all(), 'id', 'name');
$emp = ['GOVT. EMPLOYEE'=>'Govt Employee','PVT. EMPLOYEE'=>'Pvt Employee','UNEMPLOYED'=>'Unemployed'];
?>
<h2 style="text-align:center;">VOTERS</h2>
<br><br>
<div class="voter-index">



    <div class="row">
        <div class="col-sm-3 pull-right">
            <?= Html::a(' Bulk Voters Upload ', ['voterupload'], ['class' => 'btn btn-danger openModal fa fa-file', 'size'=>'md', 'header'=>'Upload Bulk Voters','name'=>'submit']) ?>
        </div>
        <div class="col-sm-2">
            <?= Html::a('Create Voter', ['create'], ['class' => ' btn btn-success openModal', 'size'=>'md', 'header'=>'Create voter','name'=>'submit']) ?>
        </div>

        <?= Html::beginForm(['voter/assign'],'post');?>
        <div class="col-sm-7">
            <?= Html::submitButton('Assign Agent', ['class' => 'btn btn-warning','value'=>'voterassign','name'=>'submit']) ?>
        </div>
    </div>
    <br>
    <p style="font-weight: bold"><span class="text-danger">*</span> <u class="text-primary">Tick the CheckBox Below To Select Voter And  Assign to Agent.</u></p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="table-responsive panel panel-success">
    <div class=" panel-heading">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\CheckboxColumn'],

            //'id',
            'name',
            'phone',
                
            
            //'polling_booth_id',
            [
                'attribute'=>'polling_booth_id',
                'value' => function ($model) {
                  $polling = PollingBooth::find()->where(['id'=>$model->polling_booth_id])->andwhere(['record_status'=>'1'])->one();
                   return isset($polling) ? $polling->name : ' ';
            
                        },
                        'format' => 'raw',
                        'label' =>'Polling Booth',
                        'filter' => $poll,
                    ],
            'house_no',
            
            //'social_status_id',
            [
                'attribute'=>'social_status_id',
                'value' => function ($model) {
                  $status = SocialStatus::find()->where(['id'=>$model->social_status_id])->andwhere(['record_status'=>'1'])->one();
                   return isset($status) ? $status->name : ' ';
            
                        },
                        'format' => 'raw',
                        'label' =>'Social Status',
                        'filter'=>$stat,
                    ],
            //'last_party_id',
            [
                'attribute'=>'last_party_id',
                'value' => function ($model) {
                  $party = Party::find()->where(['id'=>$model->last_party_id])->andwhere(['record_status'=>'1'])->one();
                   return isset($party) ? $party->name : ' ';
            
                        },
                        'format' => 'raw',
                        'label' =>'Last Party',
                        'filter'=>$part,
                    ],
            //'interest',
            //'interest_party_ticket_id',
            [
                'attribute'=>'interest_party_ticket_id',
                'value' => function ($model) {
                  $party = Party::find()->where(['id'=>$model->interest_party_ticket_id])->andwhere(['record_status'=>'1'])->one();
                   return isset($party) ? $party->name : ' ';
            
                        },
                        'format' => 'raw',
                        'label' =>'Party Interested',
                        'filter'=>$part,
                    ],
            //'employee_status',
            [
                'attribute'=>'employee_status',
                'filter'=>$emp,
            ],
            [
                'attribute'=>'address',
                'filter'=>'',
            ],
            [
                'attribute'=>'gender',
                'filter'=>'',
            ],
            
            [
                'attribute'=>'interest',
                'filter'=>'',
            ],

            //'created_by',
            //'created_date',
            //'updated_by',
            //'updated_date',
            //'record_status',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{update}',
                'buttons' => [
                    'update' => function($url, $model) {
                        return Html::a('<i class="fa fa-pencil"><i>', $url, ['class'=>'openModal', 'size'=>'md', 'header'=>'Update Voter']);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
<?= Html::endForm() ?>
</div>
</div>
