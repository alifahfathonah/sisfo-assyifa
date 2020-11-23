<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DetailBiodataDosenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-biodata-dosen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_dosen') ?>

    <?= $form->field($model, 'nama_dosen') ?>

    <?= $form->field($model, 'tempat_lahir') ?>

    <?= $form->field($model, 'tanggal_lahir') ?>

    <?php // echo $form->field($model, 'jenis_kelamin') ?>

    <?php // echo $form->field($model, 'id_agama') ?>

    <?php // echo $form->field($model, 'nama_agama') ?>

    <?php // echo $form->field($model, 'id_status_aktif') ?>

    <?php // echo $form->field($model, 'nama_status_aktif') ?>

    <?php // echo $form->field($model, 'nidn') ?>

    <?php // echo $form->field($model, 'nama_ibu') ?>

    <?php // echo $form->field($model, 'nik') ?>

    <?php // echo $form->field($model, 'nip') ?>

    <?php // echo $form->field($model, 'npwp') ?>

    <?php // echo $form->field($model, 'id_jenis_sdm') ?>

    <?php // echo $form->field($model, 'no_sk_cpns') ?>

    <?php // echo $form->field($model, 'tanggal_sk_cpns') ?>

    <?php // echo $form->field($model, 'no_sk_pengangkatan') ?>

    <?php // echo $form->field($model, 'mulai_sk_pengangkatan') ?>

    <?php // echo $form->field($model, 'id_lembaga_pengangkatan') ?>

    <?php // echo $form->field($model, 'nama_lembaga_pengangkatan') ?>

    <?php // echo $form->field($model, 'id_pangkat_golongan') ?>

    <?php // echo $form->field($model, 'nama_pangkat_golongan') ?>

    <?php // echo $form->field($model, 'id_sumber_gaji') ?>

    <?php // echo $form->field($model, 'jalan') ?>

    <?php // echo $form->field($model, 'dusun') ?>

    <?php // echo $form->field($model, 'rt') ?>

    <?php // echo $form->field($model, 'rw') ?>

    <?php // echo $form->field($model, 'ds_kel') ?>

    <?php // echo $form->field($model, 'kode_pos') ?>

    <?php // echo $form->field($model, 'id_wilayah') ?>

    <?php // echo $form->field($model, 'nama_wilayah') ?>

    <?php // echo $form->field($model, 'telepon') ?>

    <?php // echo $form->field($model, 'handphone') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'status_pernikahan') ?>

    <?php // echo $form->field($model, 'nama_suami_istri') ?>

    <?php // echo $form->field($model, 'nip_suami_istri') ?>

    <?php // echo $form->field($model, 'tanggal_mulai_pns') ?>

    <?php // echo $form->field($model, 'id_pekerjaan_suami_istri') ?>

    <?php // echo $form->field($model, 'nama_pekerjaan_suami_istri') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
