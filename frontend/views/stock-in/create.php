<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StockIn */

$this->title = 'Create Stock In';
$this->params['breadcrumbs'][] = ['label' => 'Stock Ins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-in-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
