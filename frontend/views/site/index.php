<?php
use app\models\OrderDetail;
use app\models\Client;
use app\models\Registration;
//use app\models\Counterno;

$this->title = '';

$cl = Client::find()->where(['record_status'=>'1'])->count();
$deliver = Registration::find()->where(['delivery_status'=>'DELIVERED'])->count();
$pend = Registration::find()->where(['delivery_status'=>'PENDING'])->count();
$income = Registration::find()->where(['record_status'=>'1'])->sum('paid_amount');
$due = Registration::find()->where(['record_status'=>'1'])->sum('balance_amount');

?>

<H2 style="color:#7665ad;"><b> <!-- Hello! Gleeson Audio --> </b></H2>
  <br>
  <br>
  
<?php
date_default_timezone_set('Asia/Kolkata');
setlocale(LC_MONETARY, 'en_IN');  


$today = date('Y-m-d');



?>
<div class="row">
    <div class="col-lg-4 col-xs-4">
          <!-- small box -->
          <div class="small-box" style="background-color:#8df28e">
            
            <div class="inner">
              <h4 ><b>NO OF CLIENTS</b></h4>
            </div>
            <div><h4 style="text-align: center"><b><?= $cl ?></b></h4></div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <br>
                <a  class="small-box-footer"> </a>
                <!-- <a href="index.php?r=client/index" class="small-box-footer">ADD +<i class="fa fa-arrow-circle-right"></i></a>  -->
          </div>
    </div>
    <div class="col-lg-4 col-xs-4">
          <!-- small box -->
          <div class="small-box" style="background-color:#96cafa">
            <div class="inner">
              <h4 ><b>NO OF SONGS DELIVERED</b></h4>
            </div>
            <div><h4 style="text-align: center"><b><?= $deliver ?></b></h4></div>
            <div class="icon">
              <i class="fa fa-headphones"></i>
            </div>
                <br>
                <a  class="small-box-footer"> </a>
                <!-- <a href="index.php?r=items/index" class="small-box-footer">ADD +<i class="fa fa-arrow-circle-right"></i></a>  -->
          </div>
    </div>
    <div class="col-lg-4 col-xs-4">
          <!-- small box -->
          <div class="small-box" style="background-color:#f5a4ee">
            <div class="inner">
              <h4 ><b>NO OF SONGS PENDING</b></h4>
            </div>
            <div><h4 style="text-align: center"><b><?= $pend ?></b></h4></div>
            <div class="icon">
              <i class="fa fa-headphones"></i>
            </div>
                <br>
                <a  class="small-box-footer"> </a> 
          </div>
    </div>
 </div>
 <br>
 <div class="row">
    <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background-color:#f5a98e">
            <div class="inner">
              <h4 style="text-align:center;"><b>Amount Due Till Now</b></h4>
            </div>
            <div><h4 style="text-align:center;"><b>Rs <?= $due ?></b></h4></div>
            <div class="icon">
              <i class="fa fa-headphones"></i>
            </div>
                <br>
                <a  class="small-box-footer"> </a> 
          </div>
    </div>
    <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background-color:#a489f5">
            <div class="inner">
              <h4 style="text-align:center;"><b>NET INCOME TILL NOW</b></h4>
            </div>
            <div><h4 style="text-align:center;"><b>Rs <?= $income ?></b></h4></div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
                <br>
                <a  class="small-box-footer"> </a> 
          </div>
    </div>
 </div>
 

    
<div class="site-index">
 
    <div class="body-content">


 <div ALIGN="CENTER"><p ><H2>  </H2></p></div>
    </div>


</div>

 <script type="text/javascript">
    function drawAllCharts() {
        // <?//= $this->render('js/line_charts.js') ?>

        

        <?= $this->render('js/bar_charts.js'/*, ['d'=>$data]*/) ?>

        

        // <?//= $this->render('js/area_charts.js') ?>
    }
</script>
<style type="text/css">
  .card {
    margin-top: 12px;
    border: thin solid #ccc;
    border-radius: 4px;
}
.card-body, .card-header, .card-footer {
    padding: 12px;
}
.card-label {
    text-transform: uppercase;
    font-size: 12px;
    font-family: 'IBM Plex Sans', sans-serif;
    min-height: 34px;
}
.card-value {
    font-size: 36px;
}
.card-summary {
    font-size: 10px;
    padding-left: 8px;
}
.card-header {
    border-bottom: thin solid #ccc;
}
.card-footer {
    border-top: thin solid #ccc;
}
.c1 {color: #2196f3;}
.c2 {color: #69b2f8;}
.c3 {color: #f18fb3;}
.c4 {color: #4db6ac;}
.c5 {color: #81c784;}
.male {color: #42a5f5;}
.female {color: #f48fb1;}
.footer-value {
    font-size: 28px;
}
.footer-value small {
    font-size: 50%;
}
.col-xs-5th-1, .col-xs-5th-2, .col-xs-5th-3, .col-xs-5th-4 {
  float: left;
}

.col-xs-5th-5 {
  float: left;
  width: 100%;
}

.col-xs-5th-4 {
  width: 80%;
}

.col-xs-5th-3 {
  width: 60%;
}

.col-xs-5th-2 {
  width: 40%;
}

.col-xs-5th-1 {
  width: 20%;
}

.col-xs-5th-pull-5 {
  right: 100%;
}

.col-xs-5th-pull-4 {
  right: 80%;
}

.col-xs-5th-pull-3 {
  right: 60%;
}

.col-xs-5th-pull-2 {
  right: 40%;
}

.col-xs-5th-pull-1 {
  right: 20%;
}

.col-xs-5th-pull-0 {
  right: auto;
}

.col-xs-5th-push-5 {
  left: 100%;
}

.col-xs-5th-push-4 {
  left: 80%;
}

.col-xs-5th-push-3 {
  left: 60%;
}

.col-xs-5th-push-2 {
  left: 40%;
}

.col-xs-5th-push-1 {
  left: 20%;
}

.col-xs-5th-push-0 {
  left: auto;
}

.col-xs-5th-offset-5 {
  margin-left: 100%;
}

.col-xs-5th-offset-4 {
  margin-left: 80%;
}

.col-xs-5th-offset-3 {
  margin-left: 60%;
}

.col-xs-5th-offset-2 {
  margin-left: 40%;
}

.col-xs-5th-offset-1 {
  margin-left: 20%;
}

.col-xs-5th-offset-0 {
  margin-left: 0%;
}

@media (min-width: 768px) {
  .col-sm-5th-1, .col-sm-5th-2, .col-sm-5th-3, .col-sm-5th-4 {
    float: left;
  }

  .col-sm-5th-5 {
    float: left;
    width: 100%;
  }

  .col-sm-5th-4 {
    width: 80%;
  }

  .col-sm-5th-3 {
    width: 60%;
  }

  .col-sm-5th-2 {
    width: 40%;
  }

  .col-sm-5th-1 {
    width: 20%;
  }

  .col-sm-5th-pull-5 {
    right: 100%;
  }

  .col-sm-5th-pull-4 {
    right: 80%;
  }

  .col-sm-5th-pull-3 {
    right: 60%;
  }

  .col-sm-5th-pull-2 {
    right: 40%;
  }

  .col-sm-5th-pull-1 {
    right: 20%;
  }

  .col-sm-5th-pull-0 {
    right: auto;
  }

  .col-sm-5th-push-5 {
    left: 100%;
  }

  .col-sm-5th-push-4 {
    left: 80%;
  }

  .col-sm-5th-push-3 {
    left: 60%;
  }

  .col-sm-5th-push-2 {
    left: 40%;
  }

  .col-sm-5th-push-1 {
    left: 20%;
  }

  .col-sm-5th-push-0 {
    left: auto;
  }

  .col-sm-5th-offset-5 {
    margin-left: 100%;
  }

  .col-sm-5th-offset-4 {
    margin-left: 80%;
  }

  .col-sm-5th-offset-3 {
    margin-left: 60%;
  }

  .col-sm-5th-offset-2 {
    margin-left: 40%;
  }

  .col-sm-5th-offset-1 {
    margin-left: 20%;
  }

  .col-sm-5th-offset-0 {
    margin-left: 0%;
  }
}
@media (min-width: 992px) {
  .col-md-5th-1, .col-md-5th-2, .col-md-5th-3, .col-md-5th-4 {
    float: left;
  }

  .col-md-5th-5 {
    float: left;
    width: 100%;
  }

  .col-md-5th-4 {
    width: 80%;
  }

  .col-md-5th-3 {
    width: 60%;
  }

  .col-md-5th-2 {
    width: 40%;
  }

  .col-md-5th-1 {
    width: 20%;
  }

  .col-md-5th-pull-5 {
    right: 100%;
  }

  .col-md-5th-pull-4 {
    right: 80%;
  }

  .col-md-5th-pull-3 {
    right: 60%;
  }

  .col-md-5th-pull-2 {
    right: 40%;
  }

  .col-md-5th-pull-1 {
    right: 20%;
  }

  .col-md-5th-pull-0 {
    right: auto;
  }

  .col-md-5th-push-5 {
    left: 100%;
  }

  .col-md-5th-push-4 {
    left: 80%;
  }

  .col-md-5th-push-3 {
    left: 60%;
  }

  .col-md-5th-push-2 {
    left: 40%;
  }

  .col-md-5th-push-1 {
    left: 20%;
  }

  .col-md-5th-push-0 {
    left: auto;
  }

  .col-md-5th-offset-5 {
    margin-left: 100%;
  }

  .col-md-5th-offset-4 {
    margin-left: 80%;
  }

  .col-md-5th-offset-3 {
    margin-left: 60%;
  }

  .col-md-5th-offset-2 {
    margin-left: 40%;
  }

  .col-md-5th-offset-1 {
    margin-left: 20%;
  }

  .col-md-5th-offset-0 {
    margin-left: 0%;
  }
}
@media (min-width: 1200px) {
  .col-lg-5th-1, .col-lg-5th-2, .col-lg-5th-3, .col-lg-5th-4 {
    float: left;
  }

  .col-lg-5th-5 {
    float: left;
    width: 100%;
  }

  .col-lg-5th-4 {
    width: 80%;
  }

  .col-lg-5th-3 {
    width: 60%;
  }

  .col-lg-5th-2 {
    width: 40%;
  }

  .col-lg-5th-1 {
    width: 20%;
  }

  .col-lg-5th-pull-5 {
    right: 100%;
  }

  .col-lg-5th-pull-4 {
    right: 80%;
  }

  .col-lg-5th-pull-3 {
    right: 60%;
  }

  .col-lg-5th-pull-2 {
    right: 40%;
  }

  .col-lg-5th-pull-1 {
    right: 20%;
  }

  .col-lg-5th-pull-0 {
    right: auto;
  }

  .col-lg-5th-push-5 {
    left: 100%;
  }

  .col-lg-5th-push-4 {
    left: 80%;
  }

  .col-lg-5th-push-3 {
    left: 60%;
  }

  .col-lg-5th-push-2 {
    left: 40%;
  }

  .col-lg-5th-push-1 {
    left: 20%;
  }

  .col-lg-5th-push-0 {
    left: auto;
  }

  .col-lg-5th-offset-5 {
    margin-left: 100%;
  }

  .col-lg-5th-offset-4 {
    margin-left: 80%;
  }

  .col-lg-5th-offset-3 {
    margin-left: 60%;
  }

  .col-lg-5th-offset-2 {
    margin-left: 40%;
  }

  .col-lg-5th-offset-1 {
    margin-left: 20%;
  }

  .col-lg-5th-offset-0 {
    margin-left: 0%;
  }
}
</style>
<?php
$this->registerJs(<<<JS
google.charts.load('current', {packages: ['corechart', 'line', 'bar']});
google.charts.setOnLoadCallback(drawAllCharts);

$("#d_id").change(function() {
    $("#district-filter").submit();
});
JS
);



