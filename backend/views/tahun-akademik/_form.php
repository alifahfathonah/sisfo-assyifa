<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TahunAkademik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tahun-akademik-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tahun')->textInput() ?>

    <?= $form->field($model, 'periode')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([
        'AKTIF'=>'AKTIF','NONAKTIF'=>'NONAKTIF'
    ],['prompt'=>'- Pilih -']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
