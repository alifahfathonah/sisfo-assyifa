<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\JenisPendaftaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jenis Pendaftaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-pendaftaran-index">
<div class="card shadow mb-4">
<div class="card-body">

    <p>
        <?= Html::a('Import', ['import'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Hapus Semua', ['delete-feeder'], [
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
            'id_jenis_daftar',
            'nama_jenis_daftar',
            'untuk_daftar_sekolah',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
