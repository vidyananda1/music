<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */
date_default_timezone_set('Asia/Kolkata');

?>

<header class="main-header"  style="box-shadow: 0px 1px 3px gray">

<?= Html::csrfMetaTags() ?>

    
     <?= Html::a('<span class="logo-mini">GLEESON-AUDIO</span><span class="logo-lg">GLEESON-AUDIO</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>
    <nav class="navbar navbar-static-top " role="navigation" >

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            
        </a>

        <div class="navbar-custom-menu">
            
            <ul class="nav navbar-nav ">

               
                <!-- User Account: style can be found in dropdown.less -->
                <?php if(Yii::$app->user->isGuest){?>
                <li><?=Html::a('Login',Url::to(['site/login']),['class'=>'glyphicon glyphicon-user']) ?></li>
                <?php }else{ ?>

                <li class="dropdown user user-menu" >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                       
                        <span class="hidden-xs glyphicon glyphicon-user"> <?= strtoupper(Yii::$app->user->identity->username)?></span>
                    </a>
                    <ul class="dropdown-menu" >
                        <!-- User image -->
                        <li >
                            <a href="index.php?r=user/change_password"class="btn btn-default btn-flat">Change Password</a>
                        </li> 
                        <li>
                                <?= Html::a(
                                    'Log out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default  btn-flat']
                                ) ?>
                        </li> 
                  
                        <!-- Menu Footer-->
                        
                    </ul>
                </li>
            

                <!-- User Account: style can be found in dropdown.less -->
               <?php } ?>
            </ul>
        </div>
    </nav>
</header>

