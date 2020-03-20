<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'POLLING BOOTHS';

$record_status = ['1'=>'Active', '0'=>'Deleted'];
?>
<br><br>
<div class="polling-booth-index">

    <p>
        <?= Html::a('Create Polling Booth', ['create'], ['class' => 'btn btn-success openModal', 'size'=>'sm', 'header'=>'Create Polling Booth']) ?>
    </p>

    <div class="table-responsive panel panel-success">
    <div class=" panel-heading">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'address',
            [
                'attribute' => 'record_status',
                'value' => function($model) use($record_status) {
                    return $record_status[$model->record_status];
                },
                'filter' => $record_status
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'buttons' => [
                    'update' => function($url, $model) {
                        return Html::a('<i class="fa fa-pencil"><i>', $url, ['class'=>'openModal', 'size'=>'sm', 'header'=>'Update Polling Booth']);
                    }
                ]
            ],
        ],
    ]); ?>
    </div>

</div>
</div>

