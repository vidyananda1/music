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

<footer class="main-footer" style="background-color:#a2a1ab">
	<!-- <div class="pull-left">
	<img width="100" height="65" src="images/nkgrp.png">
	</div> -->
    <div class="text-right">
        <a href="https://pudoncreative.com" target="_blank"><img width="100" height="55" src="images/pudon.png"></a>
    </div>
</footer>
