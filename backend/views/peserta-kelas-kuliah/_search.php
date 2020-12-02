<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PesertaKelasKuliahSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="peserta-kelas-kuliah-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_kelas_kuliah') ?>

    <?= $form->field($model, 'id_registrasi_mahasiswa') ?>

    <?= $form->field($model, 'id_mahasiswa') ?>

    <?= $form->field($model, 'nim') ?>

    <?php // echo $form->field($model, 'nama_mahasiswa') ?>

    <?php // echo $form->field($model, 'id_matkul') ?>

    <?php // echo $form->field($model, 'kode_mata_kuliah') ?>

    <?php // echo $form->field($model, 'nama_mata_kuliah') ?>

    <?php // echo $form->field($model, 'id_prodi') ?>

    <?php // echo $form->field($model, 'nama_program_studi') ?>

    <?php // echo $form->field($model, 'angkatan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
