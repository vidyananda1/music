<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Voter;
use app\models\Agent;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\VoterAssign */
/* @var $form yii\widgets\ActiveForm */
$voter= ArrayHelper::map(Voter::find()->where(['record_status'=>"1"])->all(), 'id', 'name');
$agent= ArrayHelper::map(Agent::find()->where(['record_status'=>"1"])->all(), 'id', 'name');
?>

<div class="voter-assign-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
    	<div class="col-sm-12">
        	
        	<?= $form->field($model, 'agent_id')->widget(Select2::classname(), [
                                'data' => $agent,
                                'language' => 'de',
                                'options' => ['placeholder' => 'Select Agent....'],
                                'pluginOptions' => [
                                'allowClear' => true
                                ],
                            ])->label('Agent');
                            ?>
    	</div>
    </div>
    <div class="row">
        
        <div class="col-sm-12">
            <?= $form->field($model, 'voter_id')->dropDownList( $voter,['prompt'=>'---Select Voter---'])->label('Voter') ?>
        </div> 
    </div>	

<div class="form-group text-center">
    <?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
