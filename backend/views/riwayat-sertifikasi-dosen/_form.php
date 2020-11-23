<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RiwayatSertifikasiDosen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="riwayat-sertifikasi-dosen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nidn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomor_peserta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_bidang_studi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_bidang_studi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_jenis_sertifikasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_jenis_sertifikasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun_sertifikasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sk_sertifikasi')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
