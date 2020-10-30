<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StockIn */

$this->title = 'Update Expenses ';
$this->params['breadcrumbs'][] = ['label' => 'Stock Ins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<br>
<div class="stock-in-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
