<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProdiNilaiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prodi-nilai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'prodi_id') ?>

    <?= $form->field($model, 'nilai_huruf') ?>

    <?= $form->field($model, 'nilai_index') ?>

    <?= $form->field($model, 'bobot_min') ?>

    <?php // echo $form->field($model, 'bobot_max') ?>

    <?php // echo $form->field($model, 'tanggal_mulai') ?>

    <?php // echo $form->field($model, 'tanggal_akhir') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
