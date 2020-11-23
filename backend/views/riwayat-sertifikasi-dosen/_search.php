<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RiwayatSertifikasiDosenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="riwayat-sertifikasi-dosen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_dosen') ?>

    <?= $form->field($model, 'nidn') ?>

    <?= $form->field($model, 'nama_dosen') ?>

    <?= $form->field($model, 'nomor_peserta') ?>

    <?php // echo $form->field($model, 'id_bidang_studi') ?>

    <?php // echo $form->field($model, 'nama_bidang_studi') ?>

    <?php // echo $form->field($model, 'id_jenis_sertifikasi') ?>

    <?php // echo $form->field($model, 'nama_jenis_sertifikasi') ?>

    <?php // echo $form->field($model, 'tahun_sertifikasi') ?>

    <?php // echo $form->field($model, 'sk_sertifikasi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
