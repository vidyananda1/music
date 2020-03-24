<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use app\models\Voter;
use app\models\Agent;
/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $form yii\widgets\ActiveForm */
$voter = ArrayHelper::map(Voter::find()->where(['record_status'=>"1"])->all(), 'id', 'name');
$agent = ArrayHelper::map(Agent::find()->where(['record_status'=>"1"])->all(), 'id', 'name');

?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
             <?= $form->field($model, "voter_id")->hiddenInput(['value'=>$model->voter_id])->label(false) ?>
        </div>
         <div class="col-md-4">
            
             <?= $form->field($model, "agent_id")->hiddenInput(['value'=>$model->agent_id])->label(false) ?>
        </div>
         <div class="col-md-4">
           
            <?= $form->field($model, "meeting_schedule")->hiddenInput(['value'=>$model->meeting_schedule])->label(false) ?>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'actual_meeting_date')->widget(
                            DatePicker::className(), [
                                // inline too, not bad
                                 'inline' => false, 
                                 
                                 'options' => ['placeholder' => ' meeting date','class'=> 'date'],

                                 // modify template for custom rendering
                                //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                                'clientOptions' => [
                                    'autoclose' => true,
                                    'todayHighlight' => true,
                                    'format' => 'yyyy-mm-dd',     


                                ]
                        ]);?>
        </div>
         <div class="col-md-4">
            <?= $form->field($model, 'outcome')->dropDownList([ 'NEUTRAL' => 'NEUTRAL', 'NEGATIVE' => 'NEGATIVE', 'SUPPORTER' => 'SUPPORTER', ], ['prompt' => '']) ?>
        </div>
         <div class="col-md-4">
            <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>
        </div>
        
    </div>

   

    <div class="form-group" style="text-align: center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
