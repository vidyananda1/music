<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DinningTable */

$this->title = 'Create Dinning Table';
$this->params['breadcrumbs'][] = ['label' => 'Dinning Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dinning-table-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
