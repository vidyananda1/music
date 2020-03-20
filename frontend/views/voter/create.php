<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Voter */

$this->title = 'Create Voter';
//$this->params['breadcrumbs'][] = ['label' => 'Voters', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="voter-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
