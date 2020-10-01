<aside class="main-sidebar" style="background-color:#effaed">

    <section class="sidebar">

        <!-- Sidebar user panel -->
       

        <?= dmstr\widgets\Menu::widget(
            [
                'defaultIconHtml' => '<i class="fa fa-angle-right"></i> ',
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Home','icon' => 'home', 'url' => ['/site/index']],
                    // ['label' => 'Gii', 'url' => ['/gii']],
                    ['label' => 'ORDER DETAILS', 'url' => ['/order-detail']],
                    ['label' => 'RECEIPT', 'url' => ['/customer-receipt']],
                    // ['label' => 'VOTER', 'url' => ['/voter']],
                    // ['label' => 'ACTIVITY', 'url' => ['/activity']],
                    // ['label' => 'STOCK', 'url' => ['/stock-ledger']],
                    // ['label' => 'ASSIGN VOTER', 'url' => ['/voter-assign']],
                    // [
                    //     'label' => 'ELECTION ANALYSIS',
                    //     'icon' => ' fa fa-tasks ',
                    //     'items' => [
                    //         ['label' => 'PREVIOUS RESULT', 'url' => ['/result']],
                    //         ['label' => 'WORKERS', 'url' => ['/workers']],
                    //         ['label' => 'VOTERS TURN-OUT', 'url' => ['/no-of-voters']],
                    // ]],

                    [
                        'label' => 'SET-UP',
                        'icon' => ' fa fa-cog ',
                        'items' => [
                            ['label' => 'CATEGORY', 'url' => ['/category']],
                            ['label' => 'ITEMS', 'url' => ['/items']],
                            ['label' => 'TAX', 'url' => ['/tax']],
                            ['label' => 'OFFER', 'url' => ['/offer']],
                            ['label' => 'EMPLOYEES', 'url' => ['/employee']],
                    ]],
                ],
            ]
        ) ?>

    </section>

</aside>
