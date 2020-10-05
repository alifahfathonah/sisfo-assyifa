<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MataKuliahProdi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mata-kuliah-prodi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tahun_akademik_id')->dropDownList($tahun_akademik,[
        'prompt' => '- Pilih Tahun Akademik -'
    ]) ?>

    <?= $form->field($model, 'mata_kuliah_id')->dropDownList($mata_kuliah,[
        'prompt' => '- Pilih Mata Kuliah -'
    ]) ?>

    <?= $form->field($model, 'prodi_id')->dropDownList($prodi,[
        'prompt' => '- Pilih Program Studi -'
    ]) ?>

    <?= $form->field($model, 'semester')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([
        'AKTIF' => 'AKTIF',
        'NONAKTIF' => 'NONAKTIF',
    ]) ?>

    <?= $form->field($model, 'bobot_sks')->textInput() ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
