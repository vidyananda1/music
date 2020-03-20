<?php
use dmstr\widgets\Alert;

?>
<div class="content-wrapper">
    <section class="content" style="background-color: #faf1ed">
        <?= Alert::widget() ?>
        <div class="page-title"><?= $this->title ?></div>
        <?= $content ?>
    </section>
</div>

<footer class="main-footer" style="background-color: #b3a79d">
	<div class="pull-left">
		&copy; 2020 LI & Sons Enterprises
	</div>
    <div class="text-right">
        <a href="https://globizs.com" target="_blank"><img style="max-height: 24px;" src="images/power.png"></a>
    </div>
</footer>
