<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PollingBooth;
use kartik\select2\Select2;
use app\models\Agent;
/* @var $this yii\web\View */
/* @var $model app\models\PollingBoothAssign */
/* @var $form yii\widgets\ActiveForm */
$poll= ArrayHelper::map(PollingBooth::find()->where(['record_status'=>"1"])->all(), 'id', 'name');
$agent= ArrayHelper::map(Agent::find()->where(['record_status'=>"1"])->all(), 'id', 'name');
?>

<div class="polling-booth-assign-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'agent_id')->widget(Select2::classname(), [
                                'data' => $agent,
                                'language' => 'de',
                                'options' => ['placeholder' => 'Select Agent...'],
                                'pluginOptions' => [
                                'allowClear' => true
                                ],
                            ])->label('Agent');
                            ?>

    <?= $form->field($model, 'polling_booth_id')->widget(Select2::classname(), [
                                'data' => $poll,
                                'language' => 'de',
                                'options' => ['placeholder' => 'Select Polling-Booth ...'],
                                'pluginOptions' => [
                                'allowClear' => true
                                ],
                            ])->label('Polling Booth');
                            ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
