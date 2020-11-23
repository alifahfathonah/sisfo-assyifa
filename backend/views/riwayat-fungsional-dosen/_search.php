<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RiwayatFungsionalDosenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="riwayat-fungsional-dosen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_dosen') ?>

    <?= $form->field($model, 'nidn') ?>

    <?= $form->field($model, 'nama_dosen') ?>

    <?= $form->field($model, 'id_jabatan_fungsional') ?>

    <?php // echo $form->field($model, 'nama_jabatan_fungsional') ?>

    <?php // echo $form->field($model, 'sk_jabatan_fungsional') ?>

    <?php // echo $form->field($model, 'mulai_sk_jabatan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
