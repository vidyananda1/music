<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
?>
<div class="site-signup">
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'username') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password') ?>
				
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
