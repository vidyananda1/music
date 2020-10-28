<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DinningTable */

$this->title = 'Update Dinning Table: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dinning Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dinning-table-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
