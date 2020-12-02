<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DosenPengajar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dosen-pengajar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_aktivitas_mengajar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_registrasi_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nidn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kelas_kuliah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_kelas_kuliah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_subtansi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sks_subtansi_total')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rencana_minggu_pertemuan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'realisasi_minggu_pertemuan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_jenis_evaluasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_jenis_evaluasi')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
