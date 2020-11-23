<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RiwayatPangkatDosen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="riwayat-pangkat-dosen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nidn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_pangkat_golongan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_pangkat_golongan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sk_pangkat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_sk_pangkat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mulai_sk_pangkat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'masa_kerja_dalam_tahun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'masa_kerja_dalam_bulan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
