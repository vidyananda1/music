<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\ElectionType;
use app\models\PollingBooth;

/* @var $this yii\web\View */
/* @var $model app\models\NoOfVoters */
/* @var $form yii\widgets\ActiveForm */
$election= ArrayHelper::map(ElectionType::find()->all(), 'id', 'name');
$poll= ArrayHelper::map(PollingBooth::find()->all(), 'id', 'name');
?>

<div class="no-of-voters-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'election_id')->dropDownList($election,['prompt' => '--Select Election--'])->label('Election');?>
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
            <?= $form->field($model, 'no_of_voters')->textInput() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'no_of_turnouts')->textInput() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
