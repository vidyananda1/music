<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VoterAssign */

$this->title = 'Create Voter Assign';
$this->params['breadcrumbs'][] = ['label' => 'Voter Assigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="voter-assign-create">

    

    <?= $this->render('_form', [
        'model' => $model,
        'modelsVoter' => $modelsVoter,
    ]) ?>

</div>
