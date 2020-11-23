<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RiwayatPangkatDosenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Riwayat Pangkat Dosens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="riwayat-pangkat-dosen-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Riwayat Pangkat Dosen', ['create'], ['class' => 'btn btn-success']) ?>
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
            'id_pangkat_golongan',
            //'nama_pangkat_golongan',
            //'sk_pangkat',
            //'tanggal_sk_pangkat',
            //'mulai_sk_pangkat',
            //'masa_kerja_dalam_tahun',
            //'masa_kerja_dalam_bulan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
