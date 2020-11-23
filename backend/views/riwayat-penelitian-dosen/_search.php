<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RiwayatPenelitianDosenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="riwayat-penelitian-dosen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_dosen') ?>

    <?= $form->field($model, 'nidn') ?>

    <?= $form->field($model, 'nama_dosen') ?>

    <?= $form->field($model, 'id_penelitian') ?>

    <?php // echo $form->field($model, 'judul_penelitian') ?>

    <?php // echo $form->field($model, 'id_kelompok_bidang') ?>

    <?php // echo $form->field($model, 'kode_kelompok_bidang') ?>

    <?php // echo $form->field($model, 'nama_kelompok_bidang') ?>

    <?php // echo $form->field($model, 'id_lembaga_iptek') ?>

    <?php // echo $form->field($model, 'nama_lembaga_iptek') ?>

    <?php // echo $form->field($model, 'tahun_kegiatan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
