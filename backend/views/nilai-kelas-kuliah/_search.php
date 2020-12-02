<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NilaiKelasKuliahSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nilai-kelas-kuliah-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_registrasi_mahasiswa') ?>

    <?= $form->field($model, 'id_kelas_kuliah') ?>

    <?= $form->field($model, 'nilai_angka') ?>

    <?= $form->field($model, 'nilai_indeks') ?>

    <?php // echo $form->field($model, 'nilai_huruf') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
