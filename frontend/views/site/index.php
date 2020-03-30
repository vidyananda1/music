<?php
use app\models\CarDetails;
use app\models\DriverDetails;
use app\models\Customer;
//use app\models\Counterno;

$this->title = '';
?>

<H2 style="text-align:center;color:#7d9c0e;"><b>ELECTION MANAGEMENT SYSTEM</b></H2>
  <br>
  <br>
  
<?php
date_default_timezone_set('Asia/Kolkata');
setlocale(LC_MONETARY, 'en_IN');  


$today = date('Y-m-d');

/*if(Yii::$app->user->identity->type == "foodwifi")
{

  $pending = Orders::find()->where(['order_status_id'=>1])->count();
  $confirmed = Orders::find()->where(['order_status_id'=>2])->count();
  $ready = Orders::find()->where(['order_status_id'=>3])->count();
  $pickedup = Orders::find()->where(['order_status_id'=>4])->count();
  $delivered = Orders::find()->where(['order_status_id'=>5])->count();
  $canceled = Orders::find()->where(['order_status_id'=>6])->count();
  $customer = Customer::find()->where(['status'=>'Active'])->count();
  $total_amt = Orders::find()->where('order_status_id!=6')->sum('grand_total');
  $todaytotal_amt = Orders::find()->where('order_status_id!=6 and date(created_date)="'.date('Y-m-d').'"')->sum('grand_total');


  $total_amt = html_entity_decode('&#8377; ').money_format('%!i', $total_amt);
  $todaytotal_amt = html_entity_decode('&#8377; ').money_format('%!i', $todaytotal_amt);
  
}
else if(Yii::$app->user->identity->type == "restaurant")
{
  $res_id = Yii::$app->user->identity->type_id;
  $pending = Orders::find()->where(['order_status_id'=>1,'restaurant_id'=>$res_id])->count();
  $confirmed = Orders::find()->where(['order_status_id'=>2,'restaurant_id'=>$res_id])->count();
  $ready = Orders::find()->where(['order_status_id'=>3,'restaurant_id'=>$res_id])->count();
  $pickedup = Orders::find()->where(['order_status_id'=>4,'restaurant_id'=>$res_id])->count();
  $delivered = Orders::find()->where(['order_status_id'=>5,'restaurant_id'=>$res_id])->count();
  $canceled = Orders::find()->where(['order_status_id'=>6,'restaurant_id'=>$res_id])->count();
  $customer = Customer::find()->where(['status'=>'Active'])->count();
  $total_amt = Orders::find()->where('order_status_id!=6 and restaurant_id='.$res_id)->sum('grand_total');
  $todaytotal_amt = Orders::find()->where('order_status_id!=6 and restaurant_id='.$res_id.' and date(created_date)="'.date('Y-m-d').'"')->sum('grand_total');

  $total_amt = html_entity_decode('&#8377; ').money_format('%!i', $total_amt);
  $todaytotal_amt = html_entity_decode('&#8377; ').money_format('%!i', $todaytotal_amt);


}
*/
  /*$employee= Employee::find()->where(['record_status'=>1])->count();
  $approval=ApprovalStatus::find()->Where(['OR', ['app_status' => 'Approved'],['app_status' => 'Approved Without Pay']])->one();
  $pending=ApprovalStatus::find()->Where(['app_status' => 'Pending'])->one();
  $reject=ApprovalStatus::find()->Where(['app_status' => 'Reject'])->one();

  $leave_approved= ApplyStatus::find()->leftJoin('apply_leave','apply_status.apply_id=apply_leave.id')->where(['apply_status.approval_status_id'=>$approval->id])->count();

  $leave_pending= ApplyStatus::find()->leftJoin('apply_leave','apply_status.apply_id=apply_leave.id')->where(['apply_status.approval_status_id'=>$pending->id])->count();

  $leave_reject= ApplyStatus::find()->leftJoin('apply_leave','apply_status.apply_id=apply_leave.id')->where(['apply_status.approval_status_id'=>$reject->id])->count();*/
  //$car = CarDetails::find()->where(['record_status'=>'1'])->count();
  //$driver = DriverDetails::find()->where(['record_status'=>'1'])->count();
  //$customer = Customer::find()->where(['record_status'=>'1'])->count();

?>
<div class="row">
    <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background-color:#8df28e">
            <div class="inner">
              <h4 style="text-align:center;"><b>NO OF AGENTS</b></h4>
            </div>
            <div><h4 style="text-align:center;"><b></b></h4></div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            
                <a href="index.php?r=car-details/index" class="small-box-footer">ADD +<i class="fa fa-arrow-circle-right"></i></a> 
          </div>
    </div>
    <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background-color:#fcf095">
            <div class="inner">
              <h4 style="text-align:center;"><b>NO OF PARTIES</b></h4>
            </div>
            <div><h4 style="text-align:center;"><b></b></h4></div>
            <div class="icon">
              <i class="fa fa-send"></i>
            </div>
            
                <a href="index.php?r=car-details/index" class="small-box-footer">ADD +<i class="fa fa-arrow-circle-right"></i></a> 
          </div>
    </div>
 </div>
 <br>
 <div class="row">
    <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box " style="background-color:#faa2a5;">
            <div class="inner">
              <h4 style="text-align:center;"><b>NO OF VOTERS</b></h4>
            </div>
            <div><h4 style="text-align:center;"><b></b></h4></div>
            <div class="icon">
              <i class="fa fa-thumbs-up"></i>
            </div>
            <a href="index.php?r=driver-details/index" class="small-box-footer">ADD +<i class="fa fa-arrow-circle-right"></i></a>       
          </div>
    </div>

    <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box " style="background-color:#96cafa;">
            <div class="inner">
              <h4 style="text-align:center;"><b>NO OF POLLING-BOOTHS</b></h4>
            </div>
            <div><h4 style="text-align:center;"><b></b></h4></div>
            <div class="icon">
              <i class="fa fa-home"></i>
            </div>
            <a href="index.php?r=driver-details/index" class="small-box-footer">ADD +<i class="fa fa-arrow-circle-right"></i></a>       
          </div>
    </div>
</div>

    
<div class="site-index">
 
    <div class="body-content">


 <div ALIGN="CENTER"><p ><H2>  </H2></p></div>
    </div>


</div>



