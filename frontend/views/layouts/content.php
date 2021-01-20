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

<footer class="main-footer" style="background-color:#e7e6ed;padding: 10px">
	
    
    	<p class="pull-left" ><strong> &copy; Gleeson Audio 2021</strong></p>
    	<p class="pull-right">Developed by <b style="color: grey;">VIDYA NINZ</b></p>
    
        <!-- <img width="80" height="40" src=""> -->
    
</footer>
