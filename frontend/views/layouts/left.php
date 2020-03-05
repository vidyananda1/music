<aside class="main-sidebar">

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
                    ['label' => 'Set Up', 'items' => [
                        ['label' => 'Polling Booths', 'url' => ['/polling-booth']],
                    ]],
                ],
            ]
        ) ?>

    </section>

</aside>
