<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Party */

$this->title = 'Update Party: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Parties', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="party-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
