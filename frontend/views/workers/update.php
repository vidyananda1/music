<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Workers */

$this->title = 'Update Workers: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Workers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="workers-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
