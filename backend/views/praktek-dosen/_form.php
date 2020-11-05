<?php

use yii\helpers\Html;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PraktekDosen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="praktek-dosen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'praktek_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'dosen_id[]')->widget(Select2::classname(), [
        'data' => $dosen,
        'options' => ['placeholder' => '- Pilih Dosen -'],
        'pluginOptions' => [
            'allowClear' => true,
            'multiple' => true,
        ],
    ])->label('Dosen'); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
