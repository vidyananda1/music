<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PollingBooth;
use kartik\select2\Select2;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\models\PollingBoothAssign */
/* @var $form yii\widgets\ActiveForm */
$poll= ArrayHelper::map(PollingBooth::find()->where(['record_status'=>"1"])->all(), 'id', 'name');
?>

<div class="polling-booth-assign-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'agent_id')->textInput(['readonly'=>true])->label('Agent') ?>
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
    'model' => $modelsPolling[0],
    'formId' => 'dynamic-form',
    'formFields' => [
        'voter_id',
        
    ],
]); ?>

<div class="container-items "><!-- widgetContainer -->
    <div class="col-sm-2 pull-right">
    <button type="button" class="add-item btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> ADD</button>
    </div>
    <br><br>
    <div class="item">
    <?php foreach ($modelsPolling as $i => $modelPolling): ?>
        <?php
        if (!$modelPolling->isNewRecord) {
            echo Html::activeHiddenInput($modelPolling, "[{$i}]id");
        }
        ?>

        <div class="row">
            <div  class="col-sm-12  panel-success">
                <div class="panel-heading">
                <div class=" pull-right " >
                        <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                    </div>
                <div class="row">
                    <div class="col-sm-10">
                        
                        <?= $form->field($modelPolling, "[{$i}]polling_booth_id")->dropdownList($poll,['prompt'=>'Select Polling-Booth','class'=>'select'])->label('Polling Booth');
                            ?>
                    </div> 
                </div>
            </div>
           </div> 
        </div><!-- .row -->


    <?php endforeach; ?>
    </div>  
</div>
<?php DynamicFormWidget::end(); ?>
<br>
<div class="form-group text-center">
    <?= Html::submitButton($modelPolling->isNewRecord ? 'Assign' : 'Update', ['class' => 'btn btn-lg btn-success']) ?>
    
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

