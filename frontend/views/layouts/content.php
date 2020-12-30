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

<footer class="main-footer text-right" style="background-color:#e7e6ed;">
	
    
        <!-- <img width="80" height="40" src=""> -->
    
</footer>
