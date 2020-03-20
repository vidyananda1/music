<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PollingBoothAssign */

$this->title = 'Update Polling Booth Assign: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Polling Booth Assigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="polling-booth-assign-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
