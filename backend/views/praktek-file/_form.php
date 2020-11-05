<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PraktekFile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="praktek-file-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'praktek_id')->textInput() ?>

    <?= $form->field($model, 'mahasiswa_id')->textInput() ?>

    <?= $form->field($model, 'dosen_id')->textInput() ?>

    <?= $form->field($model, 'file_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_koreksi_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
