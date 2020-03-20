<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\SignupForm;

/* @var $this yii\web\View */
/* @var $model app\models\Agent */
/* @var $form yii\widgets\ActiveForm */
$agent=['1'=>'Admin','2'=>'Agent','3'=>'Sub-Agent'];
?>

<div class="agent-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
             <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
             <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-6">
             <?= $form->field($model, 'agent_type')->dropdownlist($agent,['prompt' => '---select Agent Type---'])->label('Type') ?>
        </div>
        <div class="col-md-6" id="sub">
             <?= $form->field($model, 'agent_id')->textInput() ?>
        </div>
        
    </div>
    <hr>
    <?php if(!$create) :?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($user, 'username')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($user, 'email')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($user, 'password')->textInput() ?>
        </div>
    </div>
     <?php endif;?>

    <div class="form-group"  style="text-align: center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$this->registerJs('
$("#agent-agent_type").change(function(){
    //alert(this.value);
    if(this.value==1 || this.value==2){
            $("#sub").hide();
            
        }
        else{
            $("#sub").show();
        }
    
    });
') ?>
