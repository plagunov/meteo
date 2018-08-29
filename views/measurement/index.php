<?php

/* @var $this yii\web\View */

use yii\grid\GridView;

$this->title = 'Результаты измерений';

/** @var \yii\data\ActiveDataProvider $dataProvider */
?>
<div class="row">
    <h3>Результаты измерений</h3>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'time',
            [
                'attribute' => 'time',
                'format' => ['date', 'php: d.m.Y H:i:s'],
            ],
            'temperature:ntext',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>