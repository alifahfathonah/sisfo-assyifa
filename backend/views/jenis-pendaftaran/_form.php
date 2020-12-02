<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\JenisPendaftaran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jenis-pendaftaran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_jenis_daftar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_jenis_daftar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'untuk_daftar_sekolah')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
