<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\ElectionType;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\PollingBooth;
use app\models\Party;

/* @var $this yii\web\View */
/* @var $model app\models\Result */
/* @var $form yii\widgets\ActiveForm */

$election= ArrayHelper::map(ElectionType::find()->all(), 'id', 'name');
$poll= ArrayHelper::map(PollingBooth::find()->where(['record_status'=>"1"])->all(), 'id', 'name');
$party= ArrayHelper::map(Party::find()->where(['record_status'=>"1"])->all(), 'id', 'name');
?>

<div class="result-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'election_id')->widget(Select2::classname(), [
                'data' => $election,
                'language' => 'de',
                'options' => ['placeholder' => 'Select Election...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label('Election');

            ?>  
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'polling_booth_id')->widget(Select2::classname(), [
                'data' => $poll,
                'language' => 'de',
                'options' => ['placeholder' => 'Select Polling-Booth...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label('Polling-Booth');

            ?> 
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-6">
             <?= $form->field($model, 'party_id')->widget(Select2::classname(), [
                'data' => $party,
                'language' => 'de',
                'options' => ['placeholder' => 'Select Party...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label('Party');

            ?> 
        </div>
        <div class="col-md-6">
             <?= $form->field($model, 'no_of_votes')->textInput()->label('No Of Votes'); ?>
        </div>
    </div>
   
    <div class="form-group" style="text-align: center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
