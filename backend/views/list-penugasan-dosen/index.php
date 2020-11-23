<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ListPenugasanDosenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List Penugasan Dosens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="list-penugasan-dosen-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create List Penugasan Dosen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_registrasi_dosen',
            'id_dosen',
            'nama_dosen',
            'nidn',
            //'id_tahun_ajaran',
            //'nama_tahun_ajaran',
            //'id_perguruan_tinggi',
            //'nama_perguruan_tinggi',
            //'id_prodi',
            //'nama_program_studi',
            //'nomor_surat_tugas',
            //'tanggal_surat_tugas',
            //'mulai_surat_tugas',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
