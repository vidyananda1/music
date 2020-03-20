<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;
use app\models\Voter;
use app\models\Agent;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\VoterAssign */
/* @var $form yii\widgets\ActiveForm */
$voter_list= ArrayHelper::map(Voter::find()->all(), 'id', 'name');
$agent= ArrayHelper::map(Agent::find()->where(['record_status'=>"1"])->all(), 'id', 'name');
?>
<h3 style="text-align: center">ASSIGN AGENT</h3>
<br><br>
<div class="voter-assign-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="row">
    	<div class="col-sm-6">
        	
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
	<hr>
	<table class="table table-condensed table-striped">
        <tr>
            <th>Sl</th><th>Name</th>
        </tr>
        <?php foreach ($li as $sl => $voter) { ?>
            <tr>
                <td>
                    <?= $sl+1 ?>
                    <?= $form->field($modelsVoter, "[{$sl}]voter_id")->hiddenInput(['value'=>$voter->id])->label(false) ?>
                </td>
                <td><?= $voter_list[$voter->id] ?></td>
            </tr>
        <?php } ?>
    </table>
        
<br>
<div class="form-group text-center">
    <?= Html::submitButton('Assign', ['class' => 'btn btn-success']) ?>
    
</div>

<?php ActiveForm::end(); ?>

</div>
