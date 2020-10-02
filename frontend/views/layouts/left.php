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
        ['label' => 'ORDER DETAILS', 'url' => ['/order-detail']],
        ['label' => 'RECEIPT', 'url' => ['/customer-receipt']],
     ];
     if($display!="hide") {
         array_push($items,[
            'label' => 'SET-UP',
            'icon' => ' fa fa-cog ',
            'options'=>['class'=>"styleMAn"],
            'items' => [
                ['label' => 'CATEGORY', 'url' => ['/category']],
                ['label' => 'ITEMS', 'url' => ['/items']],
                ['label' => 'TAX', 'url' => ['/tax']],
                ['label' => 'OFFER', 'url' => ['/offer']],
                ['label' => 'EMPLOYEES', 'url' => ['/employee']],
            ],
        ],);
     }
?>
<aside class="main-sidebar" style="background-color:#effaed">

    <section class="sidebar">

        <!-- Sidebar user panel -->
       

        <?= dmstr\widgets\Menu::widget(
            [
                'defaultIconHtml' => '<i class="fa fa-angle-right"></i> ',
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => $items,
            ]
        ) ?>

    </section>

</aside>
