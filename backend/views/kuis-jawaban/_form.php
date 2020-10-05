<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\KuisJawaban */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kuis-jawaban-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kuis_id')->textInput() ?>

    <?= $form->field($model, 'materi_id')->textInput() ?>

    <?= $form->field($model, 'jawaban_id')->textInput() ?>

    <?= $form->field($model, 'jawaban_konten')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
