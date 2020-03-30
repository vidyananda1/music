<?php
use dmstr\widgets\Alert;

?>
<div class="content-wrapper">
    <section class="content" >
        <?= Alert::widget() ?>
        <div class="page-title"><?= $this->title ?></div>
        <?= $content ?>
    </section>
</div>

<footer class="main-footer" style="background-color: #e3e1d8">
	<div class="pull-left">
		&copy; 2020 LI & Sons Enterprises
	</div>
    <div class="text-right">
        <a href="https://globizs.com" target="_blank"><img style="max-height: 24px;" src="images/power.png"></a>
    </div>
</footer>
