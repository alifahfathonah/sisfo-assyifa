<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Jadwal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jadwal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dosen_pengampuh_id')->textInput() ?>

    <?= $form->field($model, 'hari')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'waktu_mulai')->textInput() ?>

    <?= $form->field($model, 'waktu_selesai')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
