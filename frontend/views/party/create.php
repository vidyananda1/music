<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Party */

$this->title = 'Create Party';
//$this->params['breadcrumbs'][] = ['label' => 'Parties', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="party-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
