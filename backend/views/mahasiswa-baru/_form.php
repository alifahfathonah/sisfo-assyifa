<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\JsExpression;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MahasiswaBaru */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mahasiswa-baru-form">

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'id_periode_masuk')->widget(Select2::classname(), [
        'data' => $semester,
        'options' => ['placeholder' => '- Pilih Periode -'],
        'pluginOptions' => [
            'tags'=>true,
            'allowClear' => true,
        ],
    ]); ?>

    <?= $form->field($model, 'id_jalur_daftar')->widget(Select2::classname(), [
        'data' => $jalur_masuk,
        'options' => ['placeholder' => '- Pilih Jalur Daftar -'],
        'pluginOptions' => [
            'tags'=>true,
            'allowClear' => true,
        ],
    ]); ?>

    <?php // $form->field($model, 'id_prodi')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'id_prodi')->widget(Select2::classname(), [
        'data' => $prodi,
        'options' => ['placeholder' => '- Pilih Prodi -'],
        'pluginOptions' => [
            'tags'=>true,
            'allowClear' => true,
        ],
    ]); ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nisn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_ujian')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_mahasiswa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin')->dropDownList([
        'L' => 'Laki-laki',
        'P' => 'Perempuan',
    ]) ?>

    <?= $form->field($model, 'tinggi_badan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'berat_badan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir')->input('date') ?>

    <?= $form->field($model, 'nama_ibu_kandung')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'id_wilayah')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'id_wilayah')->widget(Select2::classname(), [
        'data' => $wilayah,
        'initValueText' => '- Pilih Wilayah -',
        'options' => ['placeholder' => '- Pilih Wilayah -'],
        'pluginOptions' => [
            'minimumInputLength' => 3,
            // 'tags'=>true,
            'allowClear' => true,
            'ajax' => [
                'url' => Url::to(['mahasiswa-baru/load-wilayah']),
                'dataType' => 'json',
                'data' => new JsExpression('function(params) { return {q:params.term}; }')
            ],
            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
            'templateResult' => new JsExpression('function(id_wilayah) { return id_wilayah.nama_wilayah; }'),
            'templateSelection' => new JsExpression('function (id_wilayah) { return id_wilayah.nama_wilayah; }'),
        ],
    ]); ?>

    <?= $form->field($model, 'jalan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rw')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dusun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kelurahan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_pos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'handphone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telepon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kewarganegaraan')->widget(Select2::classname(), [
        'data' => $negara,
        'options' => ['placeholder' => '- Pilih Negara -'],
        'pluginOptions' => [
            // 'tags'=>true,
            'allowClear' => true
        ],
    ]); ?>

    <?php // $form->field($model, 'id_agama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_agama')->widget(Select2::classname(), [
        'data' => $agama,
        'options' => ['placeholder' => '- Pilih Agama -'],
        'pluginOptions' => [
            'tags'=>true,
            'allowClear' => true,
        ],
    ]); ?>

    <?= $form->field($model, 'penerima_kps')->dropDownList([
        0 => 'Tidak',
        1 => 'Ya'
    ],['prompt'=>' Pilih -']) ?>

    <?= $form->field($model, 'no_kps')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_mahasiswa')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'nim')->hiddenInput()->label(false) ?>

    <?php // $form->field($model, 'id_jenis_daftar')->textInput(['maxlength' => true]) ?>

    <?php  // $form->field($model, 'id_jalur_daftar')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'id_periode_masuk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_daftar')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'id_perguruan_tinggi')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'file_skl')->fileInput(['class'=>'form-control']) ?>

    <?= $form->field($model, 'file_skbb')->fileInput(['class'=>'form-control']) ?>

    <?= $form->field($model, 'file_izin_bekerja')->fileInput(['class'=>'form-control']) ?>

    <?= $form->field($model, 'file_pas_foto')->fileInput(['class'=>'form-control']) ?>

    <?= $form->field($model, 'file_ktp')->fileInput(['class'=>'form-control']) ?>

    <?= $form->field($model, 'file_kk')->fileInput(['class'=>'form-control']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
