<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;




?>

<?php $form = ActiveForm::begin(["id"=>"file-upload",'options' => ['enctype' => 'multipart/form-data']]); ?>
<div class="attendance-create-index">
    <div class="row">
        <div class="panel panel-default">
          <div class="panel-body">
            <a target="_blank" href="election/student_upload_temp/student_upload_template_per_class.csv">Voters upload CSV Template file Download here.....</a>
          </div>
        </div>
        
    </div>
    <div class="panel panel-default">
      <div class="panel-body">
         <!--<div class="row">
         <div class="col-md-12">
            <span style="font-size:9px;line-height: 50%;color:red">Note:- <br />1) Select ragistration radio button and upload excel CSV file first.<br /> 2) After successfully uploaded then you have to select student radio button of the same process as above.(same excel CSV file)</span>
          </div>
        </div>-->
        <div class="row">
            <div class="col-md-6">
              <?= $form->field($modelUpload, 'file')->fileInput(['id'=>'file']) ?>
            </div>
            <!-- <div class="col-md-3">
              <?//= $form->field($modelUpload, 'option')->label(false)->radiolist(['1'=>'Registration','0'=>'Student']) ?>
            </div> -->
            <div class="col-md-2">
                <?= Html::submitButton('Upload', ['class' => 'btn btn-success', 'style' => 'margin-top: 24px;']) ?>
            </div>
          <?php ActiveForm::end(); ?>
        </div>
      </div>
    </div>
</div>
<br>
<style type="text/css">
    td a {
        display: block;
    }
</style>


