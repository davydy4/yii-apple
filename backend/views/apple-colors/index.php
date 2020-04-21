<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\AppleColors;
use backend\models\AppleStatus;
use backend\models\Apples;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Цвета яблок';
$this->params['breadcrumbs'][] = ['label' => 'Яблоки', 'url' => ['/apples/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apple-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать цвет', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            [
                'attribute' => 'name',
                'value' => function ($data) {
                    return $data->name;
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'headerOptions' => ['style' => 'width:70px'],
            ],
        ],
    ]); ?>


</div>