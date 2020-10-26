<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SeminarPenguji */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seminar-penguji-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'seminar_id')->textInput() ?>

    <?= $form->field($model, 'dosen_id')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
