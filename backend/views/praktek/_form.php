<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Praktek */
/* @var $form yii\widgets\ActiveForm */
$bulan = [
    1 => 'Januari',
    2 => 'Februari',
    3 => 'Maret',
    4 => 'April',
    5 => 'Mei',
    6 => 'Juni',
    7 => 'Juli',
    8 => 'Agustus',
    9 => 'September',
    10 => 'Oktober',
    11 => 'November',
    12 => 'Desember',
];
$tahun = [];
for($i=date('Y');$i>2000;$i--)
    $tahun[$i] = $i;
?>

<div class="praktek-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tahun_akademik_id')->dropDownList($tahunAkademik,[
        'prompt' => '- Pilih Tahun Akademik -'
    ]) ?>

    <?= $form->field($model, 'instansi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bulan')->dropDownList($bulan,[
        'prompt' => '- Pilih Bulan -'
    ]) ?>

    <?= $form->field($model, 'tahun')->dropDownList($tahun,[
        'prompt' => '- Pilih Tahun -'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
