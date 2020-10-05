<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Kuis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kuis-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'materi_id')->textInput() ?>

    <?= $form->field($model, 'mahasiswa_id')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
