<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Client */

$this->title = 'Update for Client: ' . $model->producer_name;
// $this->params['breadcrumbs'][] = ['label' => 'Clients', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
// $this->params['breadcrumbs'][] = 'Update';
?>
<br><br>
<div class="client-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
