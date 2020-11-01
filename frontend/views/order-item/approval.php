<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\OrderItem;


/* @var $this yii\web\View */
/* @var $model app\models\ApplyStatus */
/* @var $form yii\widgets\ActiveForm */
$approval = ['PENDING'=>'PENDING','IN-PROCESS'=>'IN-PROCESS','COMPLETED'=>'COMPLETED','DELIVERED'=>'DELIVERED'];
?>

<div class="apply-status-form">

    <?php $form = ActiveForm::begin(); ?>  

     <?= $form->field($model, 'status')->dropDownList($approval,
                 ['prompt' => 'Select status'],
                [
                'prompt' => 'Select Approval-Type',
               
                ])->label('APPROVAL') ?>

    <div class="form-group text-center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>