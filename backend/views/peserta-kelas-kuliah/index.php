<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PesertaKelasKuliahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Peserta Kelas Kuliah';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peserta-kelas-kuliah-index">
<div class="card shadow mb-4">
<div class="card-body">
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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'id_kelas_kuliah',
            // 'id_registrasi_mahasiswa',
            // 'id_mahasiswa',
            'nim',
            'nama_mahasiswa',
            //'id_matkul',
            //'kode_mata_kuliah',
            'nama_mata_kuliah',
            //'id_prodi',
            'nama_program_studi',
            'angkatan',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
</div>
</div>
