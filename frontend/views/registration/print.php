<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Client;
use common\models\User;



 $name = ArrayHelper::map(Client::find()->all(),"id","producer_name");
 $cl = Client::find()->where(['id'=>$details->producer_name_id])->andWhere(['record_status'=>'1'])->one();
// $itemNames = ArrayHelper::map(Items::find()->all(),"id","name");

// echo "<pre>"; print_r($orderDetails);echo "</pre>";
// echo "<pre>"; print_r($orderItems);echo "</pre>";

?>

<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<br><br>
<div class="row" style='position:relative'>
  <div class="col-md-12" style="text-align:center;">
    <div style="font-size:20px">Receipt</div>
    <div class="schoolname"><b>GLEESON AUDIO</b></div>
    <div style="font-size:20px">Lairikyengbam Leikai,Imphal</div>
    
   
  </div>
  
 
  <div class="row" style="padding:0px 15px 15px 15px;">
    <div style="text-align:right;font-size:20px">Date: <?= date('d/m/Y') ?></div>
    <br>
    <table style="border:solid black 1px;width:100%;">
      <tr >
        <td colspan="4" style="background:gray;color:white" class="txt">Received a sum of Ruppees (Rs)</td>  
        <td colspan="2" style="text-align:center;" class="txt">Rs <?= $details->paid_amount ?></td>
      </tr>
      <tr>
        <td colspan="4" style="background:gray;color:white" class="txt">On account of </td>  
        <td colspan="2" style="text-align:center;" class="txt"> <?= "Creating Music Mp3 in Gleeson Audio. " ?></td>
      </tr>
      <tr >
        <td colspan="1" style="background:gray;color:white" class="txt">From </td>  
        <td colspan="5" style="text-align:center;" class="txt"> <?= isset($details->producer_name_id) ? $name[$details->producer_name_id] : ''; ?></td>
        
        
        
        
      </tr>
      <tr>
        <td colspan="1" style="background:gray;color:white" class="txt">Address</td>
        <td colspan="5" class="txt"><?= $cl->address ?></td> 
      </tr>
      <tr>
        <td colspan="1" style="background:gray;color:white" class="txt">Registration ID</td>
        <td colspan="5" class="txt"><?= $details->registration_id?></td> 
      </tr>
      <tr >
        <td colspan="1" style="background:gray;color:white" class="txt">Date of Registration</td>
        <td colspan="5" class="txt"><?= date('d-m-Y',strtotime($details->date))?></td>
        
      </tr>
      
    </table>
    <br><br>
   

    
  
    <div style="padding: 10px;background-color: gray;color: white" class="txt">
      <span>Received by : <?php $user = Yii::$app->user->id; 
           $name= User::find()->where(['id'=>$user])->one() ;
            echo $name->username;

      ?></span>
    </div>
  </div>
</div>




 

<style type="text/css">
.schoolname {
  font-size:30px;
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
  padding: 10px;
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
.txt {
  font-size: 20px;
}
</style>

<?php
$this->registerJs('window.print()');