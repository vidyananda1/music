<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ElectionType */

//$this->title = 'Update Election Type: ' . $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Election Types', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="election-type-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
