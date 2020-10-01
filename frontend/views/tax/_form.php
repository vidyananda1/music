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

    <div class="form-group text-center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
