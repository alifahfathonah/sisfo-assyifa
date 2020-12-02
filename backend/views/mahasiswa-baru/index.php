<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MahasiswaBaruSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mahasiswa Baru';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mahasiswa-baru-index">
<div class="card shadow mb-4">
<div class="card-body">

    <p>
        <?= Html::a('Tambah Mahasiswa Baru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
            'handphone',
            //'telepon',
            //'kewarganegaraan',
            //'id_agama',
            //'penerima_kps',
            //'no_kps',
            //'id_mahasiswa',
            //'nim',
            //'id_jenis_daftar',
            //'id_jalur_daftar',
            //'id_periode_masuk',
            //'tanggal_daftar',
            //'id_perguruan_tinggi',
            //'file_skl',
            //'file_skbb',
            //'file_izin_bekerja',
            //'file_pas_foto',
            //'file_ktp',
            //'file_kk',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
</div>
</div>
