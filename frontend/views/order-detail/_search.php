<?php

use Mpdf\Tag\Option;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

   <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'search')->textInput(['placeholder'=>'Search by customer name/number'])->label(false) ?>
        </div>
   

   

        <?php // echo $form->field($model, 'record_status') ?>
        <div class="col-md-4">
            <div class="form-group">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary ']) ?>
                <!-- <?//= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?> -->
                <?= Html::a('Reset', ['index'], ['class' => 'btn btn-success ','size'=>'lg', 'header'=>'Order Update']) ?>
            </div>
        
        </div>

        <?php ActiveForm::end(); ?>

    </div>
    <div class="row">
    <?php if($sum) {?>
            <label class="lblSum">This customer has a total purchase of Rs.<?= $sum ?></label>
        <?php } else if($search) {?>
            <label class="lblSum">There is no customer with the give phone number/name.</label>
        <?php } ?>
    </div>
<style>
    .btn-search{
        margin-top: 23px;
    }
    .lblSum {
        margin-left:20px ;
    }
</style>