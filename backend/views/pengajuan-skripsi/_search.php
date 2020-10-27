<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PengajuanSkripsiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengajuan-skripsi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'mahasiswa_id') ?>

    <?= $form->field($model, 'judul') ?>

    <?= $form->field($model, 'konten') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'file_url') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
