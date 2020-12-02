<?php

use yii\helpers\Html;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Prodi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prodi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenjang')->dropDownList([
        'D-I' => 'D-I',
        'D-II' => 'D-II',
        'D-III' => 'D-III',
        'D-IV' => 'D-IV',
        'S-I' => 'S-I',
        'S-II' => 'S-II',
        'Profesi' => 'Profesi',
    ]) ?>

    <?= $form->field($model, 'dosen_id')->widget(Select2::classname(), [
        'data' => $list_dosen,
        'options' => ['placeholder' => '- Pilih Dosen -'],
        'pluginOptions' => [
            'tags'=>true,
            'allowClear' => true,
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
