<aside class="main-sidebar" style="background-color:#deb3a2">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <i class="fa fa-user-circle-o fa-2x"></i>
            </div>
            <div class="pull-left info">
                <p>Username</p>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'defaultIconHtml' => '<i class="fa fa-angle-right"></i> ',
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Gii', 'url' => ['/gii']],
                    ['label' => 'TASK', 'url' => ['/task']],
                    ['label' => 'USERS', 'url' => ['/agent']],
                    ['label' => 'VOTER', 'url' => ['/voter']],
                    ['label' => 'ASSIGN VOTER', 'url' => ['/voter-assign']],

                    [
                        'label' => 'SET-UP',
                        'icon' => ' fa fa-cog ',
                        'items' => [
                            ['label' => 'POLLING-BOOTHS', 'url' => ['/polling-booth']],
                            ['label' => 'PARTY', 'url' => ['/party']],
                            ['label' => 'SOCIAL STATUS', 'url' => ['/social-status']],
                    ]],
                ],
            ]
        ) ?>

    </section>

</aside>
