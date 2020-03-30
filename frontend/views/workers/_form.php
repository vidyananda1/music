<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\ElectionType;
use app\models\Party;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Workers */
/* @var $form yii\widgets\ActiveForm */
$election= ArrayHelper::map(ElectionType::find()->all(), 'id', 'name');
$party= ArrayHelper::map(Party::find()->where(['record_status'=>"1"])->all(), 'id', 'name');
?>

<div class="workers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'election_id')->widget(Select2::classname(), [
                'data' => $election,
                'language' => 'de',
                'options' => ['placeholder' => 'Select Election...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label('Election');

            ?>

    <?= $form->field($model, 'party_id')->widget(Select2::classname(), [
                'data' => $party,
                'language' => 'de',
                'options' => ['placeholder' => 'Select Party...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label('Party');

            ?>

    <?= $form->field($model, 'no_of_workers')->textInput() ?>


    <div class="form-group" style="text-align: center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
