<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MataKuliahProdiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mata-kuliah-prodi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'mata_kuliah_id') ?>

    <?= $form->field($model, 'prodi_id') ?>

    <?= $form->field($model, 'semester') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'bobo_sks') ?>

    <?php // echo $form->field($model, 'tahun_akademik_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
