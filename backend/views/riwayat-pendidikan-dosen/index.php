<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RiwayatPendidikanDosenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Riwayat Pendidikan Dosens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="riwayat-pendidikan-dosen-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Riwayat Pendidikan Dosen', ['create'], ['class' => 'btn btn-success']) ?>
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
            'id_bidang_studi',
            //'nama_bidang_studi',
            //'id_jenjang_pendidikan',
            //'nama_jenjang_pendidikan',
            //'id_gelar_akademik',
            //'nama_gelar_akademik',
            //'id_perguruan_tinggi',
            //'nama_perguruan_tinggi',
            //'fakultas',
            //'tahun_lulus',
            //'sks_lulus',
            //'ipk',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
