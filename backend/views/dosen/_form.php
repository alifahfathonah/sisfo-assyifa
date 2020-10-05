<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Dosen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dosen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NIDN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin')->dropDownList([
        'Laki-laki' => 'Laki-laki',
        'Perempuan' => 'Perempuan',
    ],['prompt'=>'- Pilih Jenis Kelamin -']) ?>

    <?= $form->field($model, 'status')->dropDownList([
        'AKTIF' => 'AKTIF',
        'NONAKTIF' => 'NONAKTIF',
    ],['prompt'=>'- Pilih Status -']) ?>

    <?= $form->field($user, 'email')->textInput() ?>

    <?= $form->field($user, 'username')->textInput() ?>

    <?= $form->field($user, 'password_hash')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
