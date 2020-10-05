<?php

use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Absensi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="absensi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jadwal_id')->widget(Select2::classname(), [
        'data' => $jadwal,
        'options' => ['placeholder' => '- Pilih Jadwal -'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Jadwal'); ?>

    <?= $form->field($model, 'pertemuan')->textInput() ?>
    
    <?= $form->field($model, 'tanggal')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Pilih Tanggal'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format'=>'yyyy-mm-dd'
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
