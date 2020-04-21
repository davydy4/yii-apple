<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
?>
<?= Yii::$app->session->getFlash('error'); ?>

<?php $form = ActiveForm::begin([
    'options' => [
        'enctype' => 'multipart/form-data'
    ],
    'action' =>  Url::toRoute(['/apples/eat', 'id' => $model->id]),
]) ?>
<div class="ibox float-e-margins">
    <div class="ibox-content">
        <?php echo $form->field($model, 'percent')->textInput(['style' =>'width: 100px']) ?>
    </div>
</div>
<div class="form-group">
    <?php echo Html::submitButton('Кусить', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
</div>
<?php ActiveForm::end() ?>
