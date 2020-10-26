<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DosenPengampuh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dosen-pengampuh-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if($model->isNewRecord){ ?>

    <?= $form->field($model, 'dosen_id[]')->widget(Select2::classname(), [
        'data' => $dosen,
        'options' => ['placeholder' => '- Pilih Dosen -'],
        'pluginOptions' => [
            'tags'=>true,
            'allowClear' => true,
            'multiple'=>true
        ],
    ]); ?>

    <?php 

    }else{

    ?>

    <?= $form->field($model, 'dosen_id')->dropDownList($dosen,[
        'prompt'=>'- Pilih Dosen Pengampuh -'
    ]) ?>

    <?php } ?>

    <?= $form->field($model, 'mata_kuliah_prodi_id')->dropDownList($mata_kuliah,[
        'prompt'=>'- Pilih Mata Kuliah -'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
