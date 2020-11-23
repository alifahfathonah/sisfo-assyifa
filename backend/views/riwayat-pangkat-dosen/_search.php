<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RiwayatPangkatDosenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="riwayat-pangkat-dosen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_dosen') ?>

    <?= $form->field($model, 'nidn') ?>

    <?= $form->field($model, 'nama_dosen') ?>

    <?= $form->field($model, 'id_pangkat_golongan') ?>

    <?php // echo $form->field($model, 'nama_pangkat_golongan') ?>

    <?php // echo $form->field($model, 'sk_pangkat') ?>

    <?php // echo $form->field($model, 'tanggal_sk_pangkat') ?>

    <?php // echo $form->field($model, 'mulai_sk_pangkat') ?>

    <?php // echo $form->field($model, 'masa_kerja_dalam_tahun') ?>

    <?php // echo $form->field($model, 'masa_kerja_dalam_bulan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
