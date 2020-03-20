<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\SocialStatus;
use app\models\PollingBooth;
use app\models\Party;
/* @var $this yii\web\View */
/* @var $model app\models\Voter */
/* @var $form yii\widgets\ActiveForm */
$social = ArrayHelper::map(SocialStatus::find()->where(['record_status'=>"1"])->all(), 'id', 'name');
$polling = ArrayHelper::map(PollingBooth::find()->where(['record_status'=>"1"])->all(), 'id', 'name');
$party = ArrayHelper::map(Party::find()->where(['record_status'=>"1"])->all(), 'id', 'name');
?>

<div class="voter-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
             <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
           <?= $form->field($model, 'gender')->dropDownList([ 'MALE' => 'MALE', 'FEMALE' => 'FEMALE', 'OTHERS' => 'OTHERS', ], ['prompt' => '']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'house_no')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
             <?= $form->field($model, 'social_status_id')->dropDownList($social, ['prompt' => '---Select Social-Status---'])->label('Social Status') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
           <?= $form->field($model, 'polling_booth_id')->dropDownList($polling, ['prompt' => '---Select polling---'])->label('Polling Booth') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'last_party_id')->dropDownList($party, ['prompt' => '---Select Last-Party---'])->label('Last Party') ?>
        </div>
        <div class="col-md-4">
             <?= $form->field($model, 'interest_party_ticket_id')->dropDownList($party, ['prompt' => '---Select Interest-party---'])->label('Interest Party') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
           <?= $form->field($model, 'interest')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'employee_status')->dropDownList([ 'GOVT. EMPLOYEE' => 'GOVT. EMPLOYEE', 'PVT. EMPLOYEE' => 'PVT. EMPLOYEE', 'UNEMPLYED' => 'UNEMPLYED', ], ['prompt' => '']) ?>
        </div>
        
    </div>

    <div class="form-group" style="text-align: center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
