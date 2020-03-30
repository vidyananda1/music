<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NoOfVoters */

$this->title = 'Update No Of Voters: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'No Of Voters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="no-of-voters-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
