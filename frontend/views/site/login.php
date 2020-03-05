<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Sign In';

?>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>LI & Sons</b><div>Election Data</div></a>
    </div>
    <div class="login-box-body">
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
        <br><br><br><br>
        <p><a href="https://globizs.com" target="_blank"><img style="max-height: 28px;" src="images/power.png"></a></p>

    </div>
</div>
