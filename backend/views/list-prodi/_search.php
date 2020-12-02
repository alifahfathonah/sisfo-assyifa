<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ListProdiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="list-prodi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_prodi') ?>

    <?= $form->field($model, 'kode_program_studi') ?>

    <?= $form->field($model, 'nama_program_studi') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'id_jenjang_pendidikan') ?>

    <?php // echo $form->field($model, 'nama_jenjang_pendidikan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
