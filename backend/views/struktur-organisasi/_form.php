<?php

use yii\helpers\Html;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StrukturOrganisasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="struktur-organisasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dosen_id')->widget(Select2::classname(), [
        'data' => $dosen,
        'options' => ['placeholder' => '- Pilih Dosen -'],
        'pluginOptions' => [
            'tags'=>true,
            'allowClear' => true,
        ],
    ]); ?>

    <?= $form->field($model, 'jabatan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
