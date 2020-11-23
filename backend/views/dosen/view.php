<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Dosen */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Dosen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dosen-view">
    <div class="card shadow mb-4">
        <div class="card-body">
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

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

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="col-sm-12 col-md-12">
                <div class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-fungsional" role="tab" aria-controls="v-pills-fungsional" aria-selected="true">Riwayat Fungsional</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-pangkat" role="tab" aria-controls="v-pills-pangkat" aria-selected="false">Riwayat Pangkat</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-pendidikan" role="tab" aria-controls="v-pills-pendidikan" aria-selected="false">Riwayat Pendidikan</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-penelitian" role="tab" aria-controls="v-pills-penelitian" aria-selected="false">Riwayat Penelitian</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-sertifikasi" role="tab" aria-controls="v-pills-sertifikasi" aria-selected="false">Riwayat Sertifikasi</a>
                </div>

                <div class="mb-4"></div>
                
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane table-responsive fade" id="v-pills-fungsional" role="tabpanel" aria-labelledby="v-pills-fungsional-tab">
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
                    <div class="tab-pane table-responsive fade" id="v-pills-pangkat" role="tabpanel" aria-labelledby="v-pills-pangkat-tab">
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
                    <div class="tab-pane table-responsive fade" id="v-pills-pendidikan" role="tabpanel" aria-labelledby="v-pills-pendidikan-tab">
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
                    <div class="tab-pane table-responsive fade" id="v-pills-penelitian" role="tabpanel" aria-labelledby="v-pills-penelitian-tab">
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
                    <div class="tab-pane table-responsive fade" id="v-pills-sertifikasi" role="tabpanel" aria-labelledby="v-pills-sertifikasi-tab">
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
    </div>

</div>
