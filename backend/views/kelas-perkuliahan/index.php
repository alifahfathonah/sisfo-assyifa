<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\KelasPerkuliahanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kelas Perkuliahan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelas-perkuliahan-index">
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
            // 'id_kelas_kuliah',
            // 'id_prodi',
            'nama_program_studi',
            // 'id_semester',
            'nama_semester',
            //'id_matkul',
            'kode_mata_kuliah',
            'nama_mata_kuliah',
            //'nama_kelas_kuliah',
            'sks',
            //'id_dosen',
            'nama_dosen',
            'jumlah_mahasiswa',
            //'apa_untuk_pditt',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


    </div>
</div>
</div>
</div>
