<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AktivitasMengajarDosen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aktivitas-mengajar-dosen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_registrasi_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_periode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_periode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_prodi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_program_studi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_matkul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_mata_kuliah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kelas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_kelas_kuliah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rencana_minggu_pertemuan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'realisasi_minggu_pertemuan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
