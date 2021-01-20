<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Staff */
/* @var $form yii\widgets\ActiveForm */
$roles = ['admin'=>'Admin','staff'=>"Staff"];

?>

<div class="staff-form">

    <?php $form = ActiveForm::begin([
        'id' => 'staff-form'
    ]); ?>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'staff_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'address')->textInput() ?> 
        </div>
        
    </div>

    
    <hr>
    <div class="row">
        <div class="col-md-4">
            <?php 
                if(!isset($update)) 
                 echo $form->field($model, 'username',['enableAjaxValidation'=>true])->textInput() 
                ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'password')->passwordInput() ?>
        </div>
        <div class="col-md-4" style="margin-top: 25px;">
            <?= $form->field($model, 'name')->dropDownList($roles,['class'=>'dropdown']) ?>
        </div>
        
    </div>
    
    <div class="form-group text-center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
