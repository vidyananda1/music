<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SocialStatus */

$this->title = 'Create Social Status';
//$this->params['breadcrumbs'][] = ['label' => 'Social Statuses', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-status-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
