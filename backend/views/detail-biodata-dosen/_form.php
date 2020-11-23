<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DetailBiodataDosen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-biodata-dosen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_agama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_agama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_status_aktif')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_status_aktif')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nidn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_ibu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'npwp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_jenis_sdm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_sk_cpns')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_sk_cpns')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_sk_pengangkatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mulai_sk_pengangkatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_lembaga_pengangkatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_lembaga_pengangkatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_pangkat_golongan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_pangkat_golongan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_sumber_gaji')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jalan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dusun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rw')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ds_kel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_pos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_wilayah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_wilayah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telepon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'handphone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_pernikahan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_suami_istri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nip_suami_istri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_mulai_pns')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_pekerjaan_suami_istri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_pekerjaan_suami_istri')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
