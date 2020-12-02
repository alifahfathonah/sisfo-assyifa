<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\KelasPerkuliahan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kelas-perkuliahan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_kelas_kuliah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_prodi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_program_studi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_semester')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_semester')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_matkul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_mata_kuliah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_mata_kuliah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_kelas_kuliah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah_mahasiswa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apa_untuk_pditt')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
