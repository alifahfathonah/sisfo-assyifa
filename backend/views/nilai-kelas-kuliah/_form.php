<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NilaiKelasKuliah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nilai-kelas-kuliah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_registrasi_mahasiswa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kelas_kuliah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nilai_angka')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nilai_indeks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nilai_huruf')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
