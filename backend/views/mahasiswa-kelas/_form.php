<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\MahasiswaKelas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mahasiswa-kelas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kelas_id')->hiddenInput()->label(false) ?>

    <?php /*
    <?= $form->field($model, 'mahasiswa_id')->dropDownList($mahasiswa,[
        'prompt'=>'- Pilih Mahasiswa -'
    ]) ?>
    */ ?>

    <div class="form-group">
        <label for="">Angkatan</label>
        <?= Select2::widget([
            'name' => 'angkatan',
            'value' => $searchModel->angkatan,
            'data' => $angkatan,
            'options' => [
                'placeholder' => '- Pilih Angkatan -',
                'onchange' => 'location.href="'.Url::to(['mahasiswa-kelas/create','kelas_id'=>$model->kelas_id]).'&MahasiswaSearch[angkatan]="+this.value'
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

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
