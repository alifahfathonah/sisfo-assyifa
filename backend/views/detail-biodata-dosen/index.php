<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DetailBiodataDosenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detail Biodata Dosens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-biodata-dosen-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Detail Biodata Dosen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_dosen',
            'nama_dosen',
            'tempat_lahir',
            'tanggal_lahir',
            //'jenis_kelamin',
            //'id_agama',
            //'nama_agama',
            //'id_status_aktif',
            //'nama_status_aktif',
            //'nidn',
            //'nama_ibu',
            //'nik',
            //'nip',
            //'npwp',
            //'id_jenis_sdm',
            //'no_sk_cpns',
            //'tanggal_sk_cpns',
            //'no_sk_pengangkatan',
            //'mulai_sk_pengangkatan',
            //'id_lembaga_pengangkatan',
            //'nama_lembaga_pengangkatan',
            //'id_pangkat_golongan',
            //'nama_pangkat_golongan',
            //'id_sumber_gaji',
            //'jalan',
            //'dusun',
            //'rt',
            //'rw',
            //'ds_kel',
            //'kode_pos',
            //'id_wilayah',
            //'nama_wilayah',
            //'telepon',
            //'handphone',
            //'email:email',
            //'status_pernikahan',
            //'nama_suami_istri',
            //'nip_suami_istri',
            //'tanggal_mulai_pns',
            //'id_pekerjaan_suami_istri',
            //'nama_pekerjaan_suami_istri',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
