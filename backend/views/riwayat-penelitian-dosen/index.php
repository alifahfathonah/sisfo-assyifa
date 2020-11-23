<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RiwayatPenelitianDosenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Riwayat Penelitian Dosens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="riwayat-penelitian-dosen-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Riwayat Penelitian Dosen', ['create'], ['class' => 'btn btn-success']) ?>
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
            'id_penelitian',
            //'judul_penelitian',
            //'id_kelompok_bidang',
            //'kode_kelompok_bidang',
            //'nama_kelompok_bidang',
            //'id_lembaga_iptek',
            //'nama_lembaga_iptek',
            //'tahun_kegiatan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
