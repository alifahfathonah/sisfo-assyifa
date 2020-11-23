<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Dosen */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dosen-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="card shadow mb-4">
        <div class="card-body">

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'NIDN',
                    'nama',
                    'jenis_kelamin',
                    'status',
                    [
                        'attribute'=>'User',
                        'value'=>function($model)
                        {
                            return $model->user->username;
                        }
                    ],
                    'created_at',
                ],
            ]) ?>

        </div>
    </div>

    <div class="">
        <ul class="nav nav-tabs">
            <li id="fungsional-li"><a data-toggle="tab" href="#fungsional">Riwayat Fungsional</a></li>
            <li id="pangkat-li"><a data-toggle="tab" href="#pangkat">Riwayat Pangkat</a></li>
            <li id="pendidikan-li"><a data-toggle="tab" href="#pendidikan">Riwayat Pendidikan</a></li>
            <li id="penelitian-li"><a data-toggle="tab" href="#penelitian">Riwayat Penelitian</a></li>
            <li id="sertifikasi-li"><a data-toggle="tab" href="#sertifikasi">Riwayat Sertifikasi</a></li>
        </ul>

        <div class="tab-content">
        <br>
            <div id="fungsional" class="tab-pane fade table-responsive">
                <?= GridView::widget([
                    'dataProvider' => $dataProviderFungsional,
                    'filterModel' => $searchModelFungsional,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'nama_jabatan_fungsional',
                        'sk_jabatan_fungsional',
                        'mulai_sk_jabatan',

                        // ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
            <div id="pangkat" class="tab-pane fade">
                <?= GridView::widget([
                    'dataProvider' => $dataProviderPangkat,
                    'filterModel' => $searchModelPangkat,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'nama_pangkat_golongan',
                        'sk_pangkat',
                        'tanggal_sk_pangkat',
                        'mulai_sk_pangkat',
                        'masa_kerja_dalam_tahun',
                        'masa_kerja_dalam_bulan',

                        // ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
            <div id="pendidikan" class="tab-pane fade">
                <?= GridView::widget([
                    'dataProvider' => $dataProviderPendidikan,
                    'filterModel' => $searchModelPendidikan,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'nama_bidang_studi',
                        //'id_jenjang_pendidikan',
                        'nama_jenjang_pendidikan',
                        //'id_gelar_akademik',
                        'nama_gelar_akademik',
                        //'id_perguruan_tinggi',
                        'nama_perguruan_tinggi',
                        'fakultas',
                        'tahun_lulus',
                        'sks_lulus',
                        'ipk',

                        // ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
            <div id="penelitian" class="tab-pane fade">
            <?= GridView::widget([
                    'dataProvider' => $dataProviderPenelitian,
                    'filterModel' => $searchModelPenelitian,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'judul_penelitian',
                        //'id_kelompok_bidang',
                        // 'kode_kelompok_bidang',
                        'nama_kelompok_bidang',
                        //'id_lembaga_iptek',
                        'nama_lembaga_iptek',
                        'tahun_kegiatan',

                        // ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
            <div id="sertifikasi" class="tab-pane fade">
                <?= GridView::widget([
                    'dataProvider' => $dataProviderSertifikasi,
                    'filterModel' => $searchModelSertifikasi,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'nomor_peserta',
                        //'id_bidang_studi',
                        'nama_bidang_studi',
                        //'id_jenis_sertifikasi',
                        'nama_jenis_sertifikasi',
                        'tahun_sertifikasi',
                        'sk_sertifikasi',

                        // ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
        </div>
    </div>

</div>
<div class="clearfix"></div>