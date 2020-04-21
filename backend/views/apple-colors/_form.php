<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
?>
<?= Yii::$app->session->getFlash('error'); ?>

<?php $form = ActiveForm::begin([
    'options' => [
        'enctype' => 'multipart/form-data'
    ]
]) ?>
<div class="ibox float-e-margins">
    <div class="ibox-content">
        <?php echo $form->field($model, 'name') ?>
    </div>
</div>
<div class="form-group">
    <?php echo Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
</div>
<?php ActiveForm::end() ?>
