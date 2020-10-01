<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tax */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tax-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tax_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tax_percent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'record_status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
