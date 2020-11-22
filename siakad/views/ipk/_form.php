<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MahasiswaIpk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mahasiswa-ipk-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_registrasi_mahasiswa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_mahasiswa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_semester')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_semester')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_mahasiswa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'angkatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_prodi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_program_studi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_status_mahasiswa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_status_mahasiswa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ips')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ipk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sks_semester')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sks_total')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'biaya_kuliah_smt')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
