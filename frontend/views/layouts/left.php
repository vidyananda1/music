<?php 
    $user_id = Yii::$app->user->id;
    $role = \Yii::$app->authManager->getRolesByUser($user_id);
    // die(array_keys($role)[0]);
    $display= "hide";
    if(!empty($role)) {
        if(array_keys($role)[0]=="staff") {
            $display = "hide";
        }
        else{
            $display= "";
        }
    }
 
    $items = [
        ['label' => 'Home','icon' => 'home', 'url' => ['/site/index']],
        // ['label' => 'Gii', 'url' => ['/gii']],
        ['label' => 'Clients','icon' => 'user', 'url' => ['/client']],
        ['label' => 'Clients-Registration','icon' => 'pencil', 'url' => ['/registration']],
        ['label' => 'Reports','icon' => 'folder-open', 'url' => ['/report']],
       
     ];
     if($display!="hide") {
         array_push($items,[
            'label' => 'Settings',
            'icon' => ' fa fa-cog ',
            'options'=>['class'=>"styleMAn"],
            'items' => [
                ['label' => 'Discount', 'url' => ['/discount']],
                ['label' => 'User Management', 'url' => ['/staff']],
               
            ],
        ]);
     }
?>
<aside class="main-sidebar" style="box-shadow: 2px 2px 5px gray">

    <section class="sidebar">

        <!-- Sidebar user panel -->
       

        <?= dmstr\widgets\Menu::widget(
            [
                'defaultIconHtml' => '<i class="fa fa-angle-right"></i> ',
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],

                'items' => [
                    ['label' => 'Home','icon' => 'home', 'url' => ['/site/index']],
                    // ['label' => 'Gii', 'url' => ['/gii']],
                    ['label' => 'Clients','icon' => 'user', 'url' => ['/client']],
                    ['label' => 'Clients-Registration','icon' => 'pencil', 'url' => ['/registration']],
                    ['label' => 'Reports','icon' => 'folder-open', 'url' => ['/report']],

                   [
                    'label' => 'Settings',
                    'icon' => ' fa fa-cog ',
                    'options'=>['class'=>"styleMAn"],
                    'items' => [
                        ['label' => 'Discount', 'url' => ['/discount']],
                        ['label' => 'User Management', 'url' => ['/staff']],
                       
                    ],
                ]],

                'items' => $items,

            ]
        ) ?>

    </section>

</aside>
