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
<div class="row" style='position:relative'>
  <div class="col-md-12" style="text-align:center;">
    <div style="font-style:8px">Cash Receipt</div>
    <div class="schoolname"><b>NK CAFE</b></div>
    <div>New Checkon,Imphal</div>
    <div>Pin-795010,Manipur</div>
   
  </div>
  
  <div style="text-align: center">
    Receipt No: <?= $receipt->receipt_no ?>  
  </div>
  <div style="text-align:center;">Date: <?= date('d/m/Y') ?></div>
  <div class="row" style="padding:0px 15px 15px 15px;">
    <table style="border:solid black 1px;width:100%;">
      <tr style="background:gray;color:white">
        <td style="width:60%">Items</td>
        <td colspan='2'>Quantity</td>
        <td colspan='2'>Price</td>
      </tr>
      <?php foreach($orderItems as $key => $value )  {?>
      <tr style="font-size:11px">
        <td>
          <?php if(isset($itemNames[$value["item_id"]])) {
          echo $itemNames[$value["item_id"]];
        }
        ?>
        </td>
        <td colspan='2' ><?=$value["no_of_items"] ?></td>
        <td colspan='2' >Rs <?php if(isset($itemPrices[$value["item_id"]])) {
          echo $itemPrices[$value["item_id"]];
        }
        ?></td>
      </tr>
      <?php } ?>
    </table>
    <table class="nobor" >
    <tr style="font-size:11px">
        <td ><span class="total">Sub Total</span></td>
        <td ><span>Rs 
        <?php if(isset($orderDetails[0]["price"]))
                echo $orderDetails[0]["price"];
              else  
                echo "0";

         ?></span>
        </td>
      </tr>
    	<tr style="font-size:10px">
        <!-- <td style="width:60%"></td> -->
        <td  ><span class="total">Tax</span></td>
        <td ><span class="total1">Rs 
        <?php if(isset($orderDetails[0]["tax_amount"]))
                echo $orderDetails[0]["tax_amount"];
              else  
                echo "0";

         ?></span>
        </td>
      </tr>
      <tr style="font-size:10px">
        <!-- <td style="width:60%"></td> -->
        <td  ><span class="total">Discount</span></td>
        <td  ><span class="total1">Rs 
          <?php if(isset($orderDetails[0]["discount_amount"]))
                echo $orderDetails[0]["discount_amount"];
              else  
                echo "0";

         ?></span></td>
      </tr>
       <tr style="font-size:10px">
        <!-- <td style="width:60%"></td> -->
        <td  ><span class="total">Total Amount</span></td>
        <td  ><span class="total1">Rs 
          <?php if(isset($orderDetails[0]["total"]))
                echo $orderDetails[0]["total"];
              else  
                echo "0";

         ?></span></td>
      </tr>
    </table>

    
  
    <div style="position:absolute;right:5%;top:41%">
      <b>Received By</b>
    </div>
  </div>
  <br><br><br><br><br>


  <div class="col-md-12" style="text-align:center;">
    <div style="font-style:9px">Cash Receipt</div>
    <div class="schoolname"><b>NK CAFE</b></div>
    <div>New Checkon,Imphal</div>
    <div>Pin-795010,Manipur</div>
   
  </div>
  <div style="position: absolute;right:3%;top: 63%">Restuarant's Copy</div>
  
  <div style="text-align: center">
    Receipt No: <?= $receipt->receipt_no ?>    
  </div>
  <div style="text-align:center;">Date: <?= date('d/m/Y') ?></div>
  <br><br>
  <div class="row" style="padding:0px 15px 15px 15px;">
    <table style="border:solid black 1px;width:100%;">
      <tr style="background:gray;color:white">
        <td style="width:60%">Items</td>
        <td colspan='2'>Quantity</td>
        <td colspan='2'>Price</td>
      </tr>
      <?php foreach($orderItems as $key => $value )  {?>
      <tr style="font-size:11px">
        <td>
          <?php if(isset($itemNames[$value["item_id"]])) {
          echo $itemNames[$value["item_id"]];
        }
        ?>
        </td>
        <td colspan='2' ><?=$value["no_of_items"] ?></td>
        <td colspan='2' >Rs <?php if(isset($itemPrices[$value["item_id"]])) {
          echo $itemPrices[$value["item_id"]];
        }
        ?></td>
      </tr>
      <?php } ?>
    </table>
    <table class="nobor" >
    <tr style="font-size:10px">
        <td  ><span class="total">Sub Total</span></td>
        <td ><span class="total1">Rs 
        <?php if(isset($orderDetails[0]["price"]))
                echo $orderDetails[0]["price"];
              else  
                echo "0";

         ?></span>
        </td>
      </tr>
      <tr style="font-size:10px">
        <!-- <td style="width:60%"></td> -->
        <td  ><span class="total">Tax</span></td>
        <td ><span class="total1">Rs 
        <?php if(isset($orderDetails[0]["tax_amount"]))
                echo $orderDetails[0]["tax_amount"];
              else  
                echo "0";

         ?>
        </span></td>
      </tr>
      <tr style="font-size:10px">
        <!-- <td style="width:60%"></td> -->
        <td ><span class="total">Discount</span></td>
        <td  ><span class="total1">Rs 
          <?php if(isset($orderDetails[0]["discount_amount"]))
                echo $orderDetails[0]["discount_amount"];
              else  
                echo "0";

         ?></span></td>
      </tr>
       <tr style="font-size:10px">
        <!-- <td style="width:60%"></td> -->
        <td  ><span class="total">Total Amount</span></td>
        <td  ><span  class="total1">Rs 
          <?php if(isset($orderDetails[0]["total"]))
                echo $orderDetails[0]["total"];
              else  
                echo "0";

         ?></span></td>
      </tr>
    </table>

    <Br/>
    <br>
    <div style="float:right">
      <b>Received By</b>
    </div>
    <br><br>
  </div>
</div>

<style type="text/css">
.schoolname {
  font-size:20px;
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
/*.nobor  {
  border: none;
  width:100%;
  
}*/
.right {
  text-align: right;
}
.total {
  margin-right: 61px;
}
.total1 {
  margin-right: 63px;
}
</style>

<?php
$this->registerJs('window.print()');