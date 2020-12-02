<?php

use yii\helpers\Html;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PembimbingAkademis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembimbing-akademis-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dosen_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'mahasiswa_id[]')->widget(Select2::classname(), [
        'data' => $list_mahasiswa,
        'options' => ['placeholder' => '- Pilih Mahasiswa -'],
        'pluginOptions' => [
            'tags'=>true,
            'allowClear' => true,
            'multiple' => true,
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
