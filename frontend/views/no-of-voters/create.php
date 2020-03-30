<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NoOfVoters */

//$this->title = 'Create No Of Voters';
//$this->params['breadcrumbs'][] = ['label' => 'No Of Voters', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="no-of-voters-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
