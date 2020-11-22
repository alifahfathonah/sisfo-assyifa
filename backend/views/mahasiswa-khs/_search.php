<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MahasiswaKhsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mahasiswa-khs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_registrasi_mahasiswa') ?>

    <?= $form->field($model, 'id_prodi') ?>

    <?= $form->field($model, 'nama_program_studi') ?>

    <?= $form->field($model, 'id_periode') ?>

    <?php // echo $form->field($model, 'id_matkul') ?>

    <?php // echo $form->field($model, 'nama_mata_kuliah') ?>

    <?php // echo $form->field($model, 'id_kelas') ?>

    <?php // echo $form->field($model, 'nama_kelas_kuliah') ?>

    <?php // echo $form->field($model, 'sks_mata_kuliah') ?>

    <?php // echo $form->field($model, 'nilai_angka') ?>

    <?php // echo $form->field($model, 'nilai_huruf') ?>

    <?php // echo $form->field($model, 'nilai_index') ?>

    <?php // echo $form->field($model, 'nim') ?>

    <?php // echo $form->field($model, 'nama_mahasiswa') ?>

    <?php // echo $form->field($model, 'angkatan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
