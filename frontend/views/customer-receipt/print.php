<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\CustomerReceipt;

$receipt = CustomerReceipt::find()->where(['order_detail_id'=>$print_id])->one();


?>

<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<div class="row" style='border:solid black 1px;position:relative'>
  <div class="col-md-12" style="text-align:center;">
    <div style="font-style:9px">Cash Receipt</div>
    <div class="schoolname"><b>NK CAFE</b></div>
    <div>New Checkon,Imphal</div>
    <div>Pin-795010,Manipur</div>
   
  </div>
  
  <div style="padding:0px 15px 15px 15px;font-weight:bold">
    <span style="text-align:left">Receipt No: <?= $receipt->receipt_no ?>  </span>
    <span style="text-align:right;float:right">Date: <?= date('d/m/Y') ?></span>
  </div>
  <div class="row" style="padding:0px 15px 15px 15px;">
    <table style="border:solid black 1px;width:100%;">
      <tr style="background:gray;color:white">
        <td style="width:60%">Items</td>
        <td colspan='2'>Quantity</td>
        <td colspan='2'>Price</td>
      </tr>
      <tr style="font-weight:bold;font-size:13px">
        <td >Tandoori</td>
        <td colspan='2' style="fond-width:bold;font-size:15px">3</td>
        <td colspan='2' >Rs 500</td>
      </tr>
    </table>
    <table class="nobor" >
    	<tr style="font-weight:bold;font-size:13px">
        <td style="width:60%"></td>
        <td colspan='2' style="font-width:bold;font-size:15px">Tax</td>
        <td colspan='2'>Rs 50</td>
      </tr>
      <tr style="font-weight:bold;font-size:13px">
        <td style="width:60%"></td>
        <td colspan='2' style="font-width:bold;font-size:15px">Discount</td>
        <td colspan='2' >Rs 0</td>
      </tr>
       <tr style="font-weight:bold;font-size:13px">
        <td style="width:60%"></td>
        <td colspan='2' style="font-width:bold;font-size:15px">Total Amount</td>
        <td colspan='2' >Rs 550</td>
      </tr>
    </table>

    <Br/>
  
    <div style="position:absolute;right:5%;bottom:3%">
      <b>Received By</b>
    </div>
  </div>
</div>

<style type="text/css">
.schoolname {
  font-size:26px;
}
body, body * {
  font-family: 'Open Sans', sans-serif;
}

/* _tables.scss:48 */
table {
  border-collapse: collapse;
  padding:15px 15px 15px 15px;
}

table, th, td {
  border: 1px solid black;
  padding: 5px;
}
img{
  z-index: 1000;
  height: 90px;
  position: absolute;
  left: 5%;
  top: 2%;
}
hr {
  border-style: dashed;
}
.noborder {
  border: none;
  width: 100%;
}
.noborder td {
  border: none;
  padding: 2px 4px;
}
.nobor  {
  /*border: none;*/
  width:100%;
  
}
.right {
  text-align: right;
}
</style>

<?php
$this->registerJs('window.print()');