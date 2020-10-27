<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Seminar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seminar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mahasiswa_id')->textInput(['readonly'=>true]) ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?= $form->field($model, 'nilai_harapan')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?= $form->field($model, 'nilai_didapat')->dropDownList([
        'A' => 'A',
        'B' => 'B',
        'C' => 'C',
        'D' => 'D',
        'E' => 'E',
    ],['prompt'=>'- Pilih -']) ?>

<?= $form->field($model, 'tanggal')->input('date') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
