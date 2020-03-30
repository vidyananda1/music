<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ElectionType */

$this->title = 'Create Election Type';
//$this->params['breadcrumbs'][] = ['label' => 'Election Types', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="election-type-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
