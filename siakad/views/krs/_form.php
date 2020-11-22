<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MahasiswaKrs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mahasiswa-krs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_registrasi_mahasiswa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_periode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_prodi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_program_studi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_matkul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_mata_kuliah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_mata_kuliah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kelas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_kelas_kuliah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sks_mata_kuliah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_mahasiswa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'angkatan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
