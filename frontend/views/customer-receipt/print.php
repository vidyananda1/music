<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\CustomerReceipt;
use app\models\Items;
use app\models\Tax;
use app\models\Offer;

$receipt = CustomerReceipt::find()->where(['order_detail_id'=>$order_detail_id])->one();
$itemNames = ArrayHelper::map(Items::find()->all(),"id","name");
$itemPrices = ArrayHelper::map(Items::find()->all(),"id","price");
$taxes = ArrayHelper::map(Tax::find()->all(),"id","tax_name");
$itemPrices = ArrayHelper::map(Items::find()->all(),"id","price");
// echo "<pre>"; print_r($orderDetails);echo "</pre>";
// echo "<pre>"; print_r($orderItems);echo "</pre>";

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
      <?php foreach($orderItems as $key => $value )  {?>
      <tr style="font-weight:bold;font-size:13px">
        <td>
          <?php if(isset($itemNames[$value["item_id"]])) {
          echo $itemNames[$value["item_id"]];
        }
        ?>
        </td>
        <td colspan='2' style="font-weight:bold;font-size:15px"><?=$value["no_of_items"] ?></td>
        <td colspan='2' >Rs <?php if(isset($itemPrices[$value["item_id"]])) {
          echo $itemPrices[$value["item_id"]];
        }
        ?></td>
      </tr>
      <?php } ?>
    </table>
    <table class="nobor" >
    <tr style="font-weight:bold;font-size:13px">
        <td colspan='2' style="font-weight:bold;font-size:15px"><span class="total">Sub Total</span></td>
        <td colspan='2'>Rs 
        <?php if(isset($orderDetails[0]["price"]))
                echo $orderDetails[0]["price"];
              else  
                echo "0";

         ?>
        </td>
      </tr>
    	<tr style="font-weight:bold;font-size:13px">
        <!-- <td style="width:60%"></td> -->
        <td colspan='2' style="font-weight:bold;font-size:15px"><span class="total">Tax</span></td>
        <td colspan='2'>Rs 
        <?php if(isset($orderDetails[0]["tax_amount"]))
                echo $orderDetails[0]["tax_amount"];
              else  
                echo "0";

         ?>
        </td>
      </tr>
      <tr style="font-weight:bold;font-size:13px">
        <!-- <td style="width:60%"></td> -->
        <td colspan='2' style="font-weight:bold;font-size:15px"><span class="total">Discount</span></td>
        <td colspan='2' >Rs 
          <?php if(isset($orderDetails[0]["discount_amount"]))
                echo $orderDetails[0]["discount_amount"];
              else  
                echo "0";

         ?></td>
      </tr>
       <tr style="font-weight:bold;font-size:13px">
        <!-- <td style="width:60%"></td> -->
        <td colspan='2' style="font-weight:bold;font-size:15px"><span class="total">Total Amount</span></td>
        <td colspan='2' >Rs 
          <?php if(isset($orderDetails[0]["total"]))
                echo $orderDetails[0]["total"];
              else  
                echo "0";

         ?></td>
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
.total {
  margin-left: 218px;
}
</style>

<?php
$this->registerJs('window.print()');