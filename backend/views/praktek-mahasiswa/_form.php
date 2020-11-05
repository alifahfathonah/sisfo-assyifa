<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PraktekMahasiswa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="praktek-mahasiswa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'praktek_id')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <label for="">Angkatan</label>
        <?= Select2::widget([
            'name' => 'angkatan',
            'value' => $searchModel->angkatan,
            'data' => $angkatan,
            'options' => [
                'placeholder' => '- Pilih Angkatan -',
                'onchange' => 'location.href="'.Url::to(['praktek-mahasiswa/create','praktek_id'=>$model->praktek_id]).'&MahasiswaSearch[angkatan]="+this.value'
            ],
        ]);
        ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'Pilih',
                'format' => 'raw',
                'value' => function($model){
                    return '<input type="checkbox" name="mahasiswa[]" value="'.$model->id.'">';
                }
            ],
            [
                'attribute'=>'angkatan',
                'value'=>'angkatan.tahun'
            ],
            'NIM',
            'nama',
            'jenis_kelamin',
            'status',
            //'user_id',
            //'created_at',
        ],
    ]); ?>

    <?php if($dataProvider->count): ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php endif ?>

    <?php ActiveForm::end(); ?>

</div>
