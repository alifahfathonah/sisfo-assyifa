<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MahasiswaKelas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mahasiswa-kelas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kelas_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'mahasiswa_id')->dropDownList($mahasiswa,[
        'prompt'=>'- Pilih Mahasiswa -'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
