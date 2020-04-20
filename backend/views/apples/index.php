<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\AppleColors;
use backend\models\AppleStatus;
use backend\models\Apples;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Яблоки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apple-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать яблоки!', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Состарить упавшие яблоки на 5 часов!', ['scroll'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            [
                'attribute' => 'color_id',
                'value' => function ($data) {
                    return $data->color->name;
                }
            ],
            [
                'attribute' => 'created_at',
                'format' => 'raw',
                'value' => function ($data) {
                    return  Yii::$app->formatter->asDatetime($data->created_at);
                }
            ],
            [
                'attribute' => 'fell_at',
                'format' => 'raw',
                'value' => function ($data) {
                    return  Yii::$app->formatter->asDatetime($data->fell_at);
                }
            ],
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    return AppleStatus::$status[$data->status];
                }
            ],
            [
                'attribute' => 'size',
                'value' => function ($data) {
                    return Yii::$app->formatter->asPercent($data->size / 100);
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => "{drop}\n{eat}",
                'buttons' => [
                    'drop' => function ($url, $data) {
                        if (!$data->canDrop()) {
                            return '';
                        }
                        return Html::a('Уронить', $url, ['data-method' => 'POST']);
                    },
                    'eat' => function ($url, $data) {
                        if (!$data->canEat()) {
                            return '';
                        }
                        return Html::a('Кусить', $url, ['data-method' => 'POST']);
                    },
                ]
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'headerOptions' => ['style' => 'width:70px'],
            ],
        ],
    ]); ?>


</div>