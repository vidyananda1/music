<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Discount;
use app\models\Client;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Registration */
/* @var $form yii\widgets\ActiveForm */

$client= ArrayHelper::map(Client::find()->all(), 'id', 'producer_name');
$dis= ArrayHelper::map(Discount::find()->all(), 'dis_percent', 'name');
?>

<div class="registration-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4"> 
           <?= $form->field($model, 'producer_name_id')->widget(Select2::classname(), [
                'data' => $client,
                'language' => 'de',
                'options' => ['placeholder' => '------- Select Customer -------'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label('Producer Name'); 

            ?>
        </div>
        <div class="col-md-4">
           <?= $form->field($model, 'no_of_songs')->textInput()->label('No. of songs') ?>
        </div>
         <div class="col-md-4">
           <?= $form->field($model, 'singer_name')->textInput()->label('Name of the Singer/Singers') ?>
        </div>
        
    
    </div>

    <div class="row">
        
        <div class="col-md-4">
         <?= $form->field($model, 'price_per_song')->textInput()->label('Charges Per Song ( Rs )') ?> 
        </div>
        <div class="col-md-4">
          <?= $form->field($model, 'to_be_paid')->textInput(['maxlength' => true])->label('Actual amount ( Rs )'); ?>
        </div>
        <div class="col-md-4">
           <?= $form->field($model, 'discount')->dropdownList($dis,['prompt'=>'------- Select Discount Type -------'])->label('Offer Percent ( % )'); ?>
        </div>
        
    
    </div>
     <div class="row">
        <div class="col-md-4">
          <?= $form->field($model, 'discount_amount')->textInput(['maxlength' => true])->label('Discount Amount ( Rs )') ?> 
        </div>
        <div class="col-md-4">
           <?= $form->field($model, 'date')->widget(
                        DatePicker::className(), [
                            // inline too, not bad
                             'inline' => false, 
                             
                             'options' => ['placeholder' => '---- Select Date ----','class'=> 'date'],

                             // modify template for custom rendering
                            //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                                'clientOptions' => [
                                'autoclose' => true,
                                'todayHighlight' => true,
                                'format' => 'yyyy-mm-dd',     


                            ]
                    ])->label('Date of registration');?>
        </div>
        <div class="col-md-4">
           <?= $form->field($model, 'total_amount')->textInput(['maxlength' => true])->label('Total amount to be paid ( Rs )') ?>
        </div>
    
    </div>

    <div class="row">
        <div class="col-md-6">
           <?= $form->field($model, 'paid_amount')->textInput(['maxlength' => true])->label('Amount Paid ( Rs )') ?>
        </div>
        <div class="col-md-6">
           <?= $form->field($model, 'balance_amount')->textInput(['maxlength' => true])->label('Due Amount ( Rs )') ?>
        </div>
    
    </div>
    <br><hr><br>
    <div class="row">
        <div class="col-md-6">
          <?= $form->field($model, 'payment_status')->dropDownList([ 'FULL PAYMENT' => 'FULL PAYMENT', 'PARTIAL PAYMENT' => 'PARTIAL PAYMENT', 'NOT PAID' => 'NOT PAID' ], ['prompt' => '----- Select Payment Status -----']) ?>
        </div>
        <div class="col-md-6">
          <?= $form->field($model, 'delivery_status')->dropDownList([ 'DELIVERED' => 'DELIVERED', 'PENDING' => 'PENDING', 'UNDER PROCESS' => 'UNDER PROCESS', 'DEAL CANCEL' => 'DEAL CANCEL'], ['prompt' => '----- Select Song Status -----'])->label('Song Status') ?>
        </div>
    
    </div>
    <div class="row " >
        <div class="col-md-6 ">
            <?= $form->field($model, 'cancel_reason')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6 ">
          <?= $form->field($model, 'refund_amount')->textInput(['maxlength' => true]) ?> 
        </div>
        
    </div>

    <br>
    <div class="form-group text-center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-lg btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
    $this->registerJs('
    $("#registration-no_of_songs").change(function() {  
        updateTotal();
    });

    $("#registration-price_per_song").change(function() {  
        updateTotal();
    });

    $("#registration-discount").change(function() {  
        updateTotal();
    });
    $("#registration-to_be_paid").change(function() {  
        updateTotal();
    });
    $("#registration-paid_amount").change(function() {  
        updateTotal();
    });

    var updateTotal = function () {
      var input1 = $("#registration-no_of_songs").val();
      var input2 = $("#registration-price_per_song").val();
      var input3 = $("#registration-discount").val();
      var input4 =  $("#registration-paid_amount").val();
     
      if(input1==""){
        input1 = 0;
      }else{
        input1=parseInt($("#registration-no_of_songs").val());
      }
      if(input2==""){
        input2 = 0;
      }else{
        input2 = parseInt($("#registration-price_per_song").val());
      }
       if(input3==""){
        input3 = 0;
      }else{
        input3 = parseInt($("#registration-discount").val());
      }
       if(input4==""){
        input4 = 0;
      }else{
        input4 = parseInt($("#registration-paid_amount").val());
      }

      $("#registration-to_be_paid").val(input1 * input2);
      $("#registration-discount_amount").val(((input3/100)* (input1 * input2)) );
      $("#registration-total_amount").val( (input1 * input2)-((input3/100)* (input1 * input2)) );
      
      $("#registration-balance_amount").val( (input1 * input2)-((input3/100)* (input1 * input2)) - input4 );
    };

   
$(function() {
  $(".field-registration-cancel_reason").hide();
  $(".field-registration-refund_amount").hide();
    $("#registration-delivery_status").change(function(){
        $(".field-registration-cancel_reason").hide(); 
        $(".field-registration-refund_amount").hide();
        if ($(this).val() == "DEAL CANCEL")
        {
             $(".field-registration-cancel_reason").show();
             $(".field-registration-refund_amount").show();
        }
    });
});
    
    ')
?>
