<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RiwayatSertifikasiDosenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Riwayat Sertifikasi Dosens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="riwayat-sertifikasi-dosen-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Riwayat Sertifikasi Dosen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_dosen',
            'nidn',
            'nama_dosen',
            'nomor_peserta',
            //'id_bidang_studi',
            //'nama_bidang_studi',
            //'id_jenis_sertifikasi',
            //'nama_jenis_sertifikasi',
            //'tahun_sertifikasi',
            //'sk_sertifikasi',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
