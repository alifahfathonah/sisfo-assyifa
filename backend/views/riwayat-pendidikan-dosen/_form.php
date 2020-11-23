<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RiwayatPendidikanDosen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="riwayat-pendidikan-dosen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nidn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_bidang_studi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_bidang_studi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_jenjang_pendidikan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_jenjang_pendidikan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_gelar_akademik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_gelar_akademik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_perguruan_tinggi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_perguruan_tinggi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fakultas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun_lulus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sks_lulus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ipk')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
