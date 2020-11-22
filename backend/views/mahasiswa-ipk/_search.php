<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MahasiswaIpkSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mahasiswa-ipk-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_registrasi_mahasiswa') ?>

    <?= $form->field($model, 'id_mahasiswa') ?>

    <?= $form->field($model, 'id_semester') ?>

    <?= $form->field($model, 'nama_semester') ?>

    <?php // echo $form->field($model, 'nim') ?>

    <?php // echo $form->field($model, 'nama_mahasiswa') ?>

    <?php // echo $form->field($model, 'angkatan') ?>

    <?php // echo $form->field($model, 'id_prodi') ?>

    <?php // echo $form->field($model, 'nama_program_studi') ?>

    <?php // echo $form->field($model, 'id_status_mahasiswa') ?>

    <?php // echo $form->field($model, 'nama_status_mahasiswa') ?>

    <?php // echo $form->field($model, 'ips') ?>

    <?php // echo $form->field($model, 'ipk') ?>

    <?php // echo $form->field($model, 'sks_semester') ?>

    <?php // echo $form->field($model, 'sks_total') ?>

    <?php // echo $form->field($model, 'biaya_kuliah_smt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
