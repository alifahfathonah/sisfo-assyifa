<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RiwayatFungsionalDosen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="riwayat-fungsional-dosen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nidn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_dosen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_jabatan_fungsional')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_jabatan_fungsional')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sk_jabatan_fungsional')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mulai_sk_jabatan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
