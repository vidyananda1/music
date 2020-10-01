<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerReceipt */

$this->title = 'Update Customer Receipt: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Customer Receipts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customer-receipt-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
