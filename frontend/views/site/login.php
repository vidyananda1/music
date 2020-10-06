<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Sign In';

?>
<div>
    <img style="width: 100%;z-index: -1;filter: blur(1px);" src="images/food.jpg">
</div>
<div >
      <img class="name" src="images/nklogo.jpeg">
    </div>
    <br>
<div class="log">
    
    <div class="login-box-body login">
        <p class="login-box-msg">Sign in to start your session</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form->field($model, 'username')->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form->field($model, 'password')->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <div class="col-xs-4">
                <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
        
      

    </div>
</div>
<style type="text/css">
    .log{
        position: absolute;
        left:65%;
        top:23%;
        width: 30%;
        box-shadow: 15px 15px 10px #241d16;
        
    }
    .name{
        position: absolute;
        
        top:0%;
        opacity: 0.8;
        width: 100%;
    }
</style>