<aside class="main-sidebar" style="background-color:#effaed">

    <section class="sidebar">

        <!-- Sidebar user panel -->
       

        <?= dmstr\widgets\Menu::widget(
            [
                'defaultIconHtml' => '<i class="fa fa-angle-right"></i> ',
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Home','icon' => 'home', 'url' => ['/site/index']],
                    ['label' => 'Gii', 'url' => ['/gii']],
                    ['label' => 'TASK', 'url' => ['/task']],
                    ['label' => 'USERS', 'url' => ['/agent']],
                    ['label' => 'VOTER', 'url' => ['/voter']],
                    ['label' => 'ASSIGN VOTER', 'url' => ['/voter-assign']],
                    [
                        'label' => 'ELECTION ANALYSIS',
                        'icon' => ' fa fa-tasks ',
                        'items' => [
                            ['label' => 'PREVIOUS RESULT', 'url' => ['/result']],
                            ['label' => 'WORKERS', 'url' => ['/workers']],
                            ['label' => 'VOTERS TURN-OUT', 'url' => ['/no-of-voters']],
                    ]],

                    [
                        'label' => 'SET-UP',
                        'icon' => ' fa fa-cog ',
                        'items' => [
                            ['label' => 'POLLING-BOOTHS', 'url' => ['/polling-booth']],
                            ['label' => 'PARTY', 'url' => ['/party']],
                            ['label' => 'SOCIAL STATUS', 'url' => ['/social-status']],
                            ['label' => 'ELECTION TYPE', 'url' => ['/election-type']],
                    ]],
                ],
            ]
        ) ?>

    </section>

</aside>
