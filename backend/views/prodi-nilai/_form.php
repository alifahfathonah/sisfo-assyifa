<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProdiNilai */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prodi-nilai-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nilai_huruf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nilai_index')->input('number',[
        'step' => 'any'
    ]) ?>

    <?= $form->field($model, 'bobot_min')->input('number',[
        'step' => 'any'
    ]) ?>

    <?= $form->field($model, 'bobot_max')->input('number',[
        'step' => 'any'
    ]) ?>

    <?= $form->field($model, 'tanggal_mulai')->input('date') ?>

    <?= $form->field($model, 'tanggal_akhir')->input('date') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
