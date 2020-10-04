<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Items;
use app\models\Category;
use app\models\Offer;
use app\models\Tax;
use kartik\select2\Select2;
use wbraganca\dynamicform\DynamicFormWidget;


/* @var $this yii\web\View */
/* @var $model app\models\OrderDetail */
/* @var $form yii\widgets\ActiveForm */
$item= ArrayHelper::map(Items::find()->all(), 'id', 'name');
$cat= ArrayHelper::map(Category::find()->all(), 'id', 'cat_name');
$tax= ArrayHelper::map(Tax::find()->all(), 'id', 'tax_name');
$dis= ArrayHelper::map(Offer::find()->all(), 'id', 'dis_name');
?>

<div class="order-detail-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>
        </div>
         <div class="col-md-12 col-xs-12">
            <?= $form->field($model, 'customer_phone')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
         <div class="col-md-12 col-xs-12">
            <?= $form->field($model, 'customer_address')->textarea(['rows' => 6]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-xs-3">
            <?= $form->field($model, 'tax_id')->dropdownList($tax,['prompt'=>'Select Tax'])->label('Tax (if any)');  ?>
        </div>
         <div class="col-md-3 col-xs-3">
            <?= $form->field($model, 'discount')->dropdownList($dis,['prompt'=>'Select Discount'])->label('Discount (if any)');  ?>
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
                        
                        <?= $form->field($modelsitem, "[{$i}]item_id")->dropdownList($item,['prompt'=>'Select Item','class'=>'select item_id'])->label('Items'); ?>
                    </div> 
                   
                    <div class="col-sm-4" >
                        <?= $form->field($modelsitem, "[{$i}]no_of_items")->textInput(['class'=>'no_item'])->label('No Of Items'); ?>
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
        <?= Html::submitButton($modelsitem->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-lg btn-success']) ?>
    
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$url = Url::to(["amount"]);
$this->registerJs('
$(".select").select2();
$(".dynamicform_wrapper").on("beforeInsert", function(e, item) {
    // console.log("beforeInsert");
});

$(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    $(".select").select2();
    // console.log("afterInsert");
});

$(".dynamicform_wrapper").on("beforeDelete", function(e, item) {
    if (! confirm("Are you sure you want to delete this item?")) {
        return false;
    }
    return true;
});

$(".dynamicform_wrapper").on("afterDelete",async function(e) {
    // console.log("Deleted item!");
    getData();

});

$(".dynamicform_wrapper").on("limitReached",async function (e, item) {
    alert("Limit reached");
});

$(document).on("change", ".no_item", async  function main() {
  getData();
});
$(document).on("change", ".item_id", async  function () {
    getData();
  });
  
  $(document).on("change", "#orderdetail-tax_id", async  function () {
    getData();
  });
  
  $(document).on("change", "#orderdetail-discount", async  function () {
    getData();
  });
async function getData() {
    var arr = [];
    const numberItems = document.querySelectorAll(".no_item");
    var hasData = 1;
     await numberItems.forEach(function(a) {
        if(!getSum(a)){
         hasData = 0;
         return ;
        }
         arr.push(getSum(a));
    });
    if(!hasData) {
         return ;
    }
    else {
         return  requestSum(arr);
    }
}

function getSum(a) {
    var id = a.id;
    var item_no = id.substring(
        id.indexOf("-")+1,
        id.lastIndexOf("-"),
    )
    var orderItemId = `orderitem-${item_no}-item_id`;
    var orderItemValue = document.getElementById(orderItemId).value;
    const price =  $("#orderdetail-price");
    const amount =  $("#orderdetail-total");
    // console.log(a.value);
    if(orderItemValue=="" || a.value=="") {
        // console.log("value empty");
        price.val(0);
        amount.val(0);
        return 0;
    }
    return {"itemId":orderItemValue,"itemCount":a.value};
    
}

function requestSum(arr) {
    var tax =  $("#orderdetail-tax_id").val();
    var discount =  $("#orderdetail-discount").val();
    const price =  $("#orderdetail-price");
    const amount =  $("#orderdetail-total");
    const url = "'.$url.'";
    if(tax=="")
        tax = 0 ;
    if(discount=="")
        discount = 0;
    $.ajax({
        url : "'.$url.'",
        type : "POST",
        data : {
            "arr" :arr,"discount":discount,"tax":tax
        },
        dataType:"json",
        success : function(response) {              
            // var obj = JSON.parse(data);
            amount.val(response["amount"]);
            price.val(response["sum"]);
        },
        error : function(request,error)
        {
            alert("Request: "+JSON.stringify(request));
        }
    });
    return 1;
}

') ?>
<style>
.no_item{
width: 150px;
}
</style>