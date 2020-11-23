<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ListPenugasanSemuaDosenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="list-penugasan-semua-dosen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_registrasi_dosen') ?>

    <?= $form->field($model, 'id_dosen') ?>

    <?= $form->field($model, 'nama_dosen') ?>

    <?= $form->field($model, 'nidn') ?>

    <?php // echo $form->field($model, 'jenis_kelamin') ?>

    <?php // echo $form->field($model, 'id_tahun_ajaran') ?>

    <?php // echo $form->field($model, 'id_prodi') ?>

    <?php // echo $form->field($model, 'program_studi') ?>

    <?php // echo $form->field($model, 'nomor_surat_tugas') ?>

    <?php // echo $form->field($model, 'tanggal_surat_tugas') ?>

    <?php // echo $form->field($model, 'apakah_homebase') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
