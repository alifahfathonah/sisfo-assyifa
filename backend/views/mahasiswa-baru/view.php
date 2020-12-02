<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MahasiswaBaru */

$this->title = $model->nama_mahasiswa;
$this->params['breadcrumbs'][] = ['label' => 'Mahasiswa Baru', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mahasiswa-baru-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_prodi',
            'nik',
            'nisn',
            'no_ujian',
            'nama_mahasiswa',
            'jenis_kelamin',
            'tinggi_badan',
            'berat_badan',
            'tempat_lahir',
            'tanggal_lahir',
            'nama_ibu_kandung',
            'id_wilayah',
            'jalan',
            'rt',
            'rw',
            'dusun',
            'kelurahan',
            'kode_pos',
            'handphone',
            'telepon',
            'kewarganegaraan',
            'id_agama',
            'penerima_kps',
            'no_kps',
            'id_mahasiswa',
            'nim',
            'id_jenis_daftar',
            'id_jalur_daftar',
            'id_periode_masuk',
            'tanggal_daftar',
            'id_perguruan_tinggi',
            'file_skl',
            'file_skbb',
            'file_izin_bekerja',
            'file_pas_foto',
            'file_ktp',
            'file_kk',
        ],
    ]) ?>

</div>
