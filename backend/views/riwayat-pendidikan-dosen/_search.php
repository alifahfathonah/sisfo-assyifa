<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RiwayatPendidikanDosenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="riwayat-pendidikan-dosen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_dosen') ?>

    <?= $form->field($model, 'nidn') ?>

    <?= $form->field($model, 'nama_dosen') ?>

    <?= $form->field($model, 'id_bidang_studi') ?>

    <?php // echo $form->field($model, 'nama_bidang_studi') ?>

    <?php // echo $form->field($model, 'id_jenjang_pendidikan') ?>

    <?php // echo $form->field($model, 'nama_jenjang_pendidikan') ?>

    <?php // echo $form->field($model, 'id_gelar_akademik') ?>

    <?php // echo $form->field($model, 'nama_gelar_akademik') ?>

    <?php // echo $form->field($model, 'id_perguruan_tinggi') ?>

    <?php // echo $form->field($model, 'nama_perguruan_tinggi') ?>

    <?php // echo $form->field($model, 'fakultas') ?>

    <?php // echo $form->field($model, 'tahun_lulus') ?>

    <?php // echo $form->field($model, 'sks_lulus') ?>

    <?php // echo $form->field($model, 'ipk') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
