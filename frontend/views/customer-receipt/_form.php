<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerReceipt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-receipt-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'receipt_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
