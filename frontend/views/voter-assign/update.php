<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VoterAssign */

$this->title = 'Update Voter Assign: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Voter Assigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="voter-assign-update">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
