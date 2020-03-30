<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Result */

//$this->title = 'Create Result';
//$this->params['breadcrumbs'][] = ['label' => 'Results', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="result-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
