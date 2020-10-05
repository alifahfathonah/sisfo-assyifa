<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\KuisJawabanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kuis-jawaban-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kuis_id') ?>

    <?= $form->field($model, 'materi_id') ?>

    <?= $form->field($model, 'jawaban_id') ?>

    <?= $form->field($model, 'jawaban_konten') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
