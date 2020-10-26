<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\DosenPembimbing */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dosen-pembimbing-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mahasiswa_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'dosen_id')->widget(Select2::classname(), [
        'data' => $dosen,
        'options' => ['placeholder' => '- Pilih Dosen -'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Dosen'); ?>

    <?= $form->field($model, 'status')->dropDownList([
        'Pembimbing 1' => 'Pembimbing 1',
        'Pembimbing 2' => 'Pembimbing 2',
    ],[
        'prompt' => '- Pilih Status -'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
