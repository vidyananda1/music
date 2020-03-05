<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$record_status = ['1'=>'Active', '0'=>'Deleted'];
?>

<div class="polling-booth-form">

    <?php $form = ActiveForm::begin(['id'=>'default-form']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'record_status')->radioList($record_status) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'id'=>'submit-btn']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$this->registerJs(<<<JS
$("#default-form").on("beforeSubmit", function() {
    $("#submit-btn").prop("disabled", true);
    $("#submit-btn").text("Saving...");
});
JS
);