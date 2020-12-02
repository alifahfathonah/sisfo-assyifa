<?php

use yii\helpers\Html;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\KartuUjian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kartu-ujian-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_semester')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_mahasiswa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
