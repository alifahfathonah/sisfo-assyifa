<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\KelasPerkuliahanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kelas-perkuliahan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_kelas_kuliah') ?>

    <?= $form->field($model, 'id_prodi') ?>

    <?= $form->field($model, 'nama_program_studi') ?>

    <?= $form->field($model, 'id_semester') ?>

    <?php // echo $form->field($model, 'nama_semester') ?>

    <?php // echo $form->field($model, 'id_matkul') ?>

    <?php // echo $form->field($model, 'kode_mata_kuliah') ?>

    <?php // echo $form->field($model, 'nama_mata_kuliah') ?>

    <?php // echo $form->field($model, 'nama_kelas_kuliah') ?>

    <?php // echo $form->field($model, 'sks') ?>

    <?php // echo $form->field($model, 'id_dosen') ?>

    <?php // echo $form->field($model, 'nama_dosen') ?>

    <?php // echo $form->field($model, 'jumlah_mahasiswa') ?>

    <?php // echo $form->field($model, 'apa_untuk_pditt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
