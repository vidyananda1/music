<?php
use yii\helpers\Html;

?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">ED</span><span class="logo-lg">Election Data</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user-circle-o"></i>
                        <span class="hidden-xs">Username</span>
                    </a>
                    <ul class="dropdown-menu">
                        
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <p>
                                <?= Html::a('<i class="fa fa-lock"></i> Change Password', ['/site/change-password'], ['class'=>'btn btn-default btn-flat btn-block']) ?>
                            </p>
                            <p>
                                <?= Html::a(
                                    '<i class="fa fa-power-off"></i> Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat btn-block']
                                ) ?>
                            </p>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
