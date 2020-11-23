<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ListPenugasanSemuaDosenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List Penugasan Semua Dosens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="list-penugasan-semua-dosen-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create List Penugasan Semua Dosen', ['create'], ['class' => 'btn btn-success']) ?>
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
            //'jenis_kelamin',
            //'id_tahun_ajaran',
            //'id_prodi',
            //'program_studi',
            //'nomor_surat_tugas',
            //'tanggal_surat_tugas',
            //'apakah_homebase',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
