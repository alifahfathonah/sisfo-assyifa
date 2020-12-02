<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ListProdi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="list-prodi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_prodi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_program_studi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_program_studi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_jenjang_pendidikan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_jenjang_pendidikan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
