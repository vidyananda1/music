<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Items;
use app\models\Category;
use app\models\Tax;
use kartik\select2\Select2;
use wbraganca\dynamicform\DynamicFormWidget;


/* @var $this yii\web\View */
/* @var $model app\models\OrderDetail */
/* @var $form yii\widgets\ActiveForm */
$item= ArrayHelper::map(Items::find()->all(), 'id', 'name');
$cat= ArrayHelper::map(Category::find()->all(), 'id', 'cat_name');
$tax= ArrayHelper::map(Tax::find()->all(), 'id', 'tax_name');
?>

<div class="order-detail-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="row">
        <div class="col-md-4 col-xs-4">
            <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>
        </div>
         <div class="col-md-4 col-xs-4">
            <?= $form->field($model, 'customer_phone')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4 col-xs-4">
            <?= $form->field($model, 'customer_address')->textarea(['rows' => 6]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-xs-3">
            <?= $form->field($model, 'tax_id')->dropdownList($tax,['prompt'=>'Select Tax'])->label('Tax');  ?>
        </div>
         <div class="col-md-3 col-xs-3">
            <?= $form->field($model, 'discount')->textInput()->label('Discount (if any)')  ?>
        </div>
         <div class="col-md-3 col-xs-3">
            <?= $form->field($model, 'price')->textInput(['maxlength' => true])->label('Price Total') ?>
        </div>
         <div class="col-md-3 col-xs-3">
            <?= $form->field($model, 'total')->textInput(['maxlength' => true])->label('Total Amount') ?>
        </div>
    </div>
    <hr>
     <?php DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
    'widgetBody' => '.container-items', // required: css class selector
    'widgetItem' => '.item', // required: css class
    'limit' => 10, // the maximum times, an element can be cloned (default 999)
    'min' => 1, // 0 or 1 (default 1)
    'insertButton' => '.add-item', // css class
    'deleteButton' => '.remove-item', // css class
    'model' => $modelitem[0],
    'formId' => 'dynamic-form',
    'formFields' => [
        'polling_booth_id',
        
    ],
]); ?>
<div class="container-items "><!-- widgetContainer -->
    <div class="col-sm-2 pull-right">
    <button type="button" class="add-item btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> ADD</button>
    </div>
    <br><br>
    <div class="item">
    <?php foreach ($modelitem as $i => $modelsitem): ?>
        <?php
        if (!$modelsitem->isNewRecord) {
            echo Html::activeHiddenInput($modelsitem, "[{$i}]id");
        }
        ?>

        <div class="row">
            <div  class="col-sm-12  panel-success">
                <div class="panel-heading">
                <div class=" pull-right " >
                        <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                    </div>
                <div class="row">
                    
                    <div class="col-sm-4">
                        
                        <?= $form->field($modelsitem, "[{$i}]item_id")->dropdownList($item,['prompt'=>'Select Item','class'=>'select'])->label('Items'); ?>
                    </div> 
                    <div class="col-sm-4">
                        
                       <?= $form->field($modelsitem, "[{$i}]category_id")->dropdownList($cat,['prompt'=>'Select Category','class'=>'select'])->label('Category'); ?>
                    </div>
                    <div class="col-sm-3">
                        <?= $form->field($modelsitem, "[{$i}]no_of_items")->textInput()->label('No Of Items'); ?>
                    </div> 
                </div>
            </div>
           </div> 
        </div><!-- .row -->


    <?php endforeach; ?>
    </div>  
</div>
    <?php DynamicFormWidget::end();?>
    <br>

    <div class="form-group text-center">
        <?= Html::submitButton($modelsitem->isNewRecord ? 'Update' : 'Update', ['class' => 'btn btn-lg btn-success']) ?>
    
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php

$this->registerJs('
$(".select").select2();
$(".dynamicform_wrapper").on("beforeInsert", function(e, item) {
    console.log("beforeInsert");
});

$(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    $(".select").select2();
    console.log("afterInsert");
});

$(".dynamicform_wrapper").on("beforeDelete", function(e, item) {
    if (! confirm("Are you sure you want to delete this item?")) {
        return false;
    }
    return true;
});

$(".dynamicform_wrapper").on("afterDelete", function(e) {
    console.log("Deleted item!");
});

$(".dynamicform_wrapper").on("limitReached", function(e, item) {
    alert("Limit reached");
});

') ?>
