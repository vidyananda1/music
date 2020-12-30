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

// $this->title = 'Reports';
?>

<div class="headings"><h3><b>Income Break-Up</b></h3></div>
    

<table style="border:solid black 1px;width:100%;">
    <tr>
        <th>Producer Name</th>
        <th>Registration ID</th>
        <th>Amount to be paid</th>
        <th>Due Amount</th>
        <th>Amount Received</th>
        <th>Date</th>
    </tr>

<?php
foreach($incomes as $key=>$value) { 
?>
<tr>
    <td><?=$value["name"]?></td>
    <td><?=$value["registration_id"]?></td>
    <td><?=$value["total_amount"]?></td>
    <td><?=$value["balance_amount"]?></td>
    <td><?=$value["paid_amount"]?></td>
    <td><?= date('d-m-Y',strtotime($value["date"]))?></td>
</tr>
<?php } ?>
<tr style="font-weight: bold"><td class="sub-header" colspan="4">Net Income</td><td colspan="2" class="sub-header"> Rs <?=$sumIncome?></td></tr>
</table>
<br><br><br>


<style >
    table,th,td {
        border: 1px solid;
        font-family: 'Open Sans';
        text-align: center;
        padding: 8px 4px 8px 4px;
        font-size:15px;
    }
    .headings{
        /*font-size: 1.5em;*/
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