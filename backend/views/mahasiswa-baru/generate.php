<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MahasiswaBaruSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mahasiswa Baru';
$this->params['breadcrumbs'][] = $this->title;
$array = Yii::$app->request->queryParams;
array_unshift($array, 'export');
?>
<div class="mahasiswa-baru-index">
<div class="card shadow mb-4">
<div class="card-body">

    <div class="mahasiswa-baru-form">

    <?php $form = ActiveForm::begin(['method'=>'get']); ?>

        <div class="form-group">
            <label for="">Periode Masuk</label>
            <?= Select2::widget([
                'name' => 'MahasiswaBaruSearch[id_periode_masuk]',
                'value' => $searchModel->id_periode_masuk,
                'data' => $semester,
                'options' => [
                    'placeholder' => '- Pilih Periode Masuk -',
                ],
            ]);
            ?>
        </div>

        <div class="form-group">
            <label for="">Program Studi</label>
            <?= Select2::widget([
                'name' => 'MahasiswaBaruSearch[id_prodi]',
                'value' => $searchModel->id_prodi,
                'data' => $prodi,
                'options' => [
                    'placeholder' => '- Pilih Program Studi -',
                ],
            ]);
            ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Generate', ['class' => 'btn btn-success','name'=>'generate', 'value' => 'generate']) ?>
            <?= Html::submitButton('Regenerate', ['class' => 'btn btn-primary','name'=>'generate', 'value' => 'regenerate']) ?>
            <?= Html::a('Export', Url::to($array), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if(isset($searchModel->id_periode_masuk)): ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute'=>'prodi',
                'value'=>'prodi.nama_program_studi',
            ],
            'nik',
            // 'nisn',
            // 'no_ujian',
            'nama_mahasiswa',
            'jenis_kelamin',
            //'tinggi_badan',
            //'berat_badan',
            //'tempat_lahir',
            //'tanggal_lahir',
            //'nama_ibu_kandung',
            //'id_wilayah',
            //'jalan',
            //'rt',
            //'rw',
            //'dusun',
            //'kelurahan',
            //'kode_pos',
            // 'handphone',
            //'telepon',
            //'kewarganegaraan',
            //'id_agama',
            //'penerima_kps',
            //'no_kps',
            'nim',
            //'id_jenis_daftar',
            //'id_jalur_daftar',
            'id_periode_masuk',
            //'tanggal_daftar',
            //'id_perguruan_tinggi',
            //'file_skl',
            //'file_skbb',
            //'file_izin_bekerja',
            //'file_pas_foto',
            //'file_ktp',
            //'file_kk',
        ],
    ]); ?>

    <?php endif ?>


</div>
</div>
</div>
