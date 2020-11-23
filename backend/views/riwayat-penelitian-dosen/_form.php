<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RiwayatPenelitianDosen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="riwayat-penelitian-dosen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nidn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_penelitian')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'judul_penelitian')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kelompok_bidang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_kelompok_bidang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_kelompok_bidang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_lembaga_iptek')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_lembaga_iptek')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun_kegiatan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
