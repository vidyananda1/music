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

    <?= $form->field($model, 'staff_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
    
    <?php 
    if(!isset($update)) 
     echo $form->field($model, 'username',['enableAjaxValidation'=>true])->textInput() 
    ?>
    
    <?= $form->field($model, 'address')->textInput() ?>
    
    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'name')->dropDownList($roles,['class'=>'dropdown']) ?>

    <div class="form-group text-center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
