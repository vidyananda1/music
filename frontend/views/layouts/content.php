<?php
use dmstr\widgets\Alert;

?>
<div class="content-wrapper">
    <section class="content" >
        <img style="width: 100%;margin-top: -14px;"  src="images/nklogo.jpeg">
        <?= Alert::widget() ?>
        <div class="page-title"><?= $this->title ?></div>
        <?= $content ?>
    </section>
</div>

<footer class="main-footer" style="background-color: #e3e1d8">
	<div class="pull-left">
		&copy; 2020 Restuarant Management
	</div>
    <div class="text-right">
        <a href="https://hadron.com" target="_blank"><img width="50" height="40" src="images/hadron.png"></a>
    </div>
</footer>
