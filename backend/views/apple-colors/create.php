<?php
/* @var $this yii\web\View */

$this->title = 'Добавление цвета';
$this->params['breadcrumbs'][] = ['label' => 'Список цветов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <?php echo $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
