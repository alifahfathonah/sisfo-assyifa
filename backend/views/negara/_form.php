<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Negara */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="negara-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_negara')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_negara')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>