<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AktivitasMengajarDosenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aktivitas-mengajar-dosen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_registrasi_dosen') ?>

    <?= $form->field($model, 'id_dosen') ?>

    <?= $form->field($model, 'nama_dosen') ?>

    <?= $form->field($model, 'id_periode') ?>

    <?php // echo $form->field($model, 'nama_periode') ?>

    <?php // echo $form->field($model, 'id_prodi') ?>

    <?php // echo $form->field($model, 'nama_program_studi') ?>

    <?php // echo $form->field($model, 'id_matkul') ?>

    <?php // echo $form->field($model, 'nama_mata_kuliah') ?>

    <?php // echo $form->field($model, 'id_kelas') ?>

    <?php // echo $form->field($model, 'nama_kelas_kuliah') ?>

    <?php // echo $form->field($model, 'rencana_minggu_pertemuan') ?>

    <?php // echo $form->field($model, 'realisasi_minggu_pertemuan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
