<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MahasiswaIpk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mahasiswa-ipk-form">

<?php $form = ActiveForm::begin([
        'options' => [
            'enctype'=>'multipart/form-data'
        ]
    ]); ?>

    <?= $form->field($model, 'tipe')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'file')->input('file') ?>

    <div class="form-group">
        <?= Html::submitButton('Import', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
