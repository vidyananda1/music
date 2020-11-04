<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Sign In';

?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<div id="bg">
      <img class="name" src="images/theme.jpg">
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
            <div class="col-md-6">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <div class="col-md-6">
                <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
        
      

    </div>
</div>
<style type="text/css">
    .log{
        position: absolute;
        left:29%;
        top:23%;
        width: 40%;
        box-shadow: 15px 15px 15px #241d16;
        
    }
    #bg {
          position: fixed; 
          top: -50%; 
          left: -50%; 
          width: 200%; 
          height: 200%;
        }
#bg img {
          position: absolute; 
          top: 0; 
          left: 0; 
          right: 0; 
          bottom: 0; 
          margin: auto; 
          min-width: 50%;
          min-height: 50%;
        }
   

</style>