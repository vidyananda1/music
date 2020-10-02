<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Items */
/* @var $form yii\widgets\ActiveForm */
$cat= ArrayHelper::map(Category::find()->all(), 'id', 'cat_name');
?>

<div class="items-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
    	<div class="col-md-6">
    		<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    	</div>
    	<div class="col-md-6">
    		<?= $form->field($model, 'category')->dropdownList($cat,['prompt'=>'Select Category'])->label('Category');  ?>
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-6">
    		<?= $form->field($model, 'quantity')->dropDownList([ 'HALF' => 'HALF', 'FULL' => 'FULL', 'QUARTER' => 'QUARTER',
    		'NONE' => 'NONE',], ['prompt' => 'Select Quantity']) ?>
    	</div>
    	<div class="col-md-6">
    		<?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
    	</div>
    </div>

    <hr>

    <div class="form-group text-center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
