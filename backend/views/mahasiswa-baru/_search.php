<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MahasiswaBaruSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mahasiswa-baru-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_prodi') ?>

    <?= $form->field($model, 'nik') ?>

    <?= $form->field($model, 'nisn') ?>

    <?= $form->field($model, 'no_ujian') ?>

    <?php // echo $form->field($model, 'nama_mahasiswa') ?>

    <?php // echo $form->field($model, 'jenis_kelamin') ?>

    <?php // echo $form->field($model, 'tinggi_badan') ?>

    <?php // echo $form->field($model, 'berat_badan') ?>

    <?php // echo $form->field($model, 'tempat_lahir') ?>

    <?php // echo $form->field($model, 'tanggal_lahir') ?>

    <?php // echo $form->field($model, 'nama_ibu_kandung') ?>

    <?php // echo $form->field($model, 'id_wilayah') ?>

    <?php // echo $form->field($model, 'jalan') ?>

    <?php // echo $form->field($model, 'rt') ?>

    <?php // echo $form->field($model, 'rw') ?>

    <?php // echo $form->field($model, 'dusun') ?>

    <?php // echo $form->field($model, 'kelurahan') ?>

    <?php // echo $form->field($model, 'kode_pos') ?>

    <?php // echo $form->field($model, 'handphone') ?>

    <?php // echo $form->field($model, 'telepon') ?>

    <?php // echo $form->field($model, 'kewarganegaraan') ?>

    <?php // echo $form->field($model, 'id_agama') ?>

    <?php // echo $form->field($model, 'penerima_kps') ?>

    <?php // echo $form->field($model, 'no_kps') ?>

    <?php // echo $form->field($model, 'id_mahasiswa') ?>

    <?php // echo $form->field($model, 'nim') ?>

    <?php // echo $form->field($model, 'id_jenis_daftar') ?>

    <?php // echo $form->field($model, 'id_jalur_daftar') ?>

    <?php // echo $form->field($model, 'id_periode_masuk') ?>

    <?php // echo $form->field($model, 'tanggal_daftar') ?>

    <?php // echo $form->field($model, 'id_perguruan_tinggi') ?>

    <?php // echo $form->field($model, 'file_skl') ?>

    <?php // echo $form->field($model, 'file_skbb') ?>

    <?php // echo $form->field($model, 'file_izin_bekerja') ?>

    <?php // echo $form->field($model, 'file_pas_foto') ?>

    <?php // echo $form->field($model, 'file_ktp') ?>

    <?php // echo $form->field($model, 'file_kk') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
