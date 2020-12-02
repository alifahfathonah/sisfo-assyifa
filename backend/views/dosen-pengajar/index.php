<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DosenPengajarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dosen Pengajar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dosen-pengajar-index">
<div class="card shadow mb-4">
<div class="card-body">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Import', ['import'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Hapus', ['delete-feeder'], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete all item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="table-responsive">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'id_aktivitas_mengajar',
            // 'id_registrasi_dosen',
            // 'id_dosen',
            'nidn',
            [
                'attribute'=>'nama_dosen',
                'contentOptions' => ['style' => 'white-space: nowrap;'],

            ],
            //'id_kelas_kuliah',
            'nama_kelas_kuliah',
            [
                'attribute'=>'mata_kuliah',
                'value'=>'kelasKuliah.nama_mata_kuliah',
            ]
            //'id_subtansi',
            //'sks_subtansi_total',
            // 'rencana_minggu_pertemuan',
            // 'realisasi_minggu_pertemuan',
            //'id_jenis_evaluasi',
            // 'nama_jenis_evaluasi',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
</div>
</div>
</div>
