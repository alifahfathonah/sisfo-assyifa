<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DosenPengajarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dosen-pengajar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_aktivitas_mengajar') ?>

    <?= $form->field($model, 'id_registrasi_dosen') ?>

    <?= $form->field($model, 'id_dosen') ?>

    <?= $form->field($model, 'nidn') ?>

    <?php // echo $form->field($model, 'nama_dosen') ?>

    <?php // echo $form->field($model, 'id_kelas_kuliah') ?>

    <?php // echo $form->field($model, 'nama_kelas_kuliah') ?>

    <?php // echo $form->field($model, 'id_subtansi') ?>

    <?php // echo $form->field($model, 'sks_subtansi_total') ?>

    <?php // echo $form->field($model, 'rencana_minggu_pertemuan') ?>

    <?php // echo $form->field($model, 'realisasi_minggu_pertemuan') ?>

    <?php // echo $form->field($model, 'id_jenis_evaluasi') ?>

    <?php // echo $form->field($model, 'nama_jenis_evaluasi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
