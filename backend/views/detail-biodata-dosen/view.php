<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\DetailBiodataDosen */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Detail Biodata Dosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="detail-biodata-dosen-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'id_dosen',
            'nama_dosen',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            'id_agama',
            'nama_agama',
            'id_status_aktif',
            'nama_status_aktif',
            'nidn',
            'nama_ibu',
            'nik',
            'nip',
            'npwp',
            'id_jenis_sdm',
            'no_sk_cpns',
            'tanggal_sk_cpns',
            'no_sk_pengangkatan',
            'mulai_sk_pengangkatan',
            'id_lembaga_pengangkatan',
            'nama_lembaga_pengangkatan',
            'id_pangkat_golongan',
            'nama_pangkat_golongan',
            'id_sumber_gaji',
            'jalan',
            'dusun',
            'rt',
            'rw',
            'ds_kel',
            'kode_pos',
            'id_wilayah',
            'nama_wilayah',
            'telepon',
            'handphone',
            'email:email',
            'status_pernikahan',
            'nama_suami_istri',
            'nip_suami_istri',
            'tanggal_mulai_pns',
            'id_pekerjaan_suami_istri',
            'nama_pekerjaan_suami_istri',
        ],
    ]) ?>

</div>
