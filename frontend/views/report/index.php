<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\Items;
use app\models\Category;
use app\models\OrderDetail;
use yii\helpers\ArrayHelper;
use kartik\export\ExportMenu;
use app\models\Customer;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DateRangePicker;

$this->title = 'Reports';
?>

<div class="headings">Income</div>
    

<table style="border:solid black 1px;width:100%;">
    <tr>
        <th>Cutomer Name</th><th>Sale(in Rs.)</th><th>Order Date</th>
    </tr>

<?php
foreach($incomes as $key=>$value) { 
?>
<tr>
    <td><?=$value["cus_name"]?></td>
    <td><?=$value["total"]?></td>
    <td><?= date('d-m-Y',strtotime($value["updated_date"]))?></td>
</tr>
<?php } ?>
<tr><td class="sub-header">Total Income(in Rs.)</td><td colspan="2" class="sub-header"><?=$sumIncome?></td></tr>
</table>
<br><br><br>
<div class="headings">Expenses</div>
<table style="border:solid black 1px;width:100%;">
<tr>
        <th>Item</th><th>Price(in Rs.)</th><th>Date</th>
    </tr>
<?php

foreach($expenses as $key=>$value) { 
?>
<tr>
    <td><?=$value["item_name"]?></td>
    <td><?=$value["price"]?></td>
    <td><?= date('d-m-Y',strtotime($value["date"]))?></td>
</tr>


<?php } ?>
<tr><td class="sub-header">Total Expenses(in Rs.)</td><td colspan="2" class="sub-header"><?=$sumExpenses?></td></tr>

</table>

<br>

<div class="headings">Total Profit: Rs<span style="margin-left: 10px;"><?=$sumIncome-$sumExpenses ?></span></div>

<style >
    table,th,td {
        border: 1px solid;
        font-family: 'Open Sans';
        text-align: center;
    }
    .headings{
        font-size: 1.5em;
        font-family: 'Open Sans';
        /* margin-left: 50px; */
    }
    .sub-header{
        text-align: center;
        /* font-weight:bold */
    }
@media print {
  header,footer { 
    display: none; 
  }
}



</style>
<?php
//  $url = Url::to(["index"]);
$this->registerJs('
console.log("1");
window.print();
');