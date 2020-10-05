<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AbsensiMahasiswa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="absensi-mahasiswa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mahasiswa_id')->widget(Select2::classname(), [
        'data' => $mahasiswa,
        'options' => ['placeholder' => '- Pilih Mahasiswa -'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Mahasiswa'); ?>

    <?= $form->field($model, 'status')->dropDownList([
        'Hadir' => 'Hadir',
        'Sakit' => 'Sakit',
        'Izin' => 'Izin',
        'Tanpa Keterangan' => 'Tanpa Keterangan',
    ],['prompt'=>'- Pilih Status -']) ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
