<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DetailPenugasanDosenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detail Penugasan Dosens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-penugasan-dosen-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Detail Penugasan Dosen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_registrasi_dosen',
            'id_tahun_ajaran',
            'nama_tahun_ajaran',
            'id_perguruan_tinggi',
            //'nama_perguruan_tinggi',
            //'nidn',
            //'id_dosen',
            //'nama_dosen',
            //'id_prodi',
            //'nama_program_studi',
            //'nomor_surat_tugas',
            //'tanggal_surat_tugas',
            //'mulai_surat_tugas',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
