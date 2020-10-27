<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\SeminarPenguji */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seminar-penguji-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'seminar_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'dosen_id')->widget(Select2::classname(), [
        'data' => $dosen,
        'options' => ['placeholder' => '- Pilih Dosen -'],
        'pluginOptions' => [
            'tags'=>true,
            'allowClear' => true
        ],
    ])->label('Dosen Penguji'); ?>

    <?= $form->field($model, 'status')->dropDownList([
        'Penguji 1' => 'Penguji 1',
        'Penguji 2' => 'Penguji 2',
        'Penguji 3' => 'Penguji 3',
    ],[
        'prompt' => '- Pilih -'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
