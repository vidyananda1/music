<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PollingBoothAssign */

$this->title = 'Create Polling Booth Assign';
$this->params['breadcrumbs'][] = ['label' => 'Polling Booth Assigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="polling-booth-assign-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
