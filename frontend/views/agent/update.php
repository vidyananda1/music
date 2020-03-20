<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Agent */

$this->title = 'Update Agent: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Agents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="agent-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
