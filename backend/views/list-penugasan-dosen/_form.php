<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ListPenugasanDosen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="list-penugasan-dosen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_registrasi_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nidn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_tahun_ajaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_tahun_ajaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_perguruan_tinggi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_perguruan_tinggi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_prodi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_program_studi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomor_surat_tugas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_surat_tugas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mulai_surat_tugas')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
