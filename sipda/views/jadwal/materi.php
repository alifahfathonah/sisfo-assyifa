<?php

use common\models\Kuis;
use common\models\KuisJawaban;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Jadwal */

$this->title = 'Materi - '.$model->dosenPengampuh->mataKuliah->nama.' - '.$model->dosenPengampuh->kelas->nama;
$this->params['breadcrumbs'][] = ['label' => 'Jadwal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<style>
div[data-oembed-url] div {
    max-width: 100%!important;
}
</style>
<div class="jadwal-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <div class="col-sm-12 col-md-3">
        <?php if(Yii::$app->user->can('Dosen')): ?>
        <a href="<?=Url::to(['materi/create','dosen_pengampuh_id'=>$model->dosen_pengampuh_id,'jadwal_id'=>$model->id])?>" class="btn btn-success btn-block">Buat Materi Baru</a>
        <p></p>
        <?php endif ?>
        <ul class="list-group">
            <li class="list-group-item">
                <b>Materi</b> 
            </li>
        <?php foreach($materies as $key => $m): if(!Yii::$app->user->can('Dosen') && $m->status == 'Private') continue; ?>
            <li class="list-group-item">
                <a href="<?=Url::to(['jadwal/materi','id'=>$model->id,'index'=>$key])?>">
                    <?php if($key == $index): ?>
                    <b><?=$m->judul ? $m->judul : $m->id?></b>
                    <?php else: ?>
                        <?=$m->judul ? $m->judul : $m->id?>
                    <?php endif ?>
                </a>
            </li>
        <?php endforeach ?>
        </ul>
    </div>

    <div class="col-sm-12 col-md-9">
    <?php if(!empty($materies)): ?>
        <?php if(!empty($materi)): ?>
        <?php if(Yii::$app->user->can('Dosen')): ?>
        <p>
            <?= Html::a('Update', ['materi/update', 'id' => $materi->id,'jadwal_id'=>$model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['materi/delete', 'id' => $materi->id,'jadwal_id'=>$model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
        <?php endif ?>
        <h3><?=$materi->judul?></h3>
        <?=$materi->konten?>

        <?php if($materi->tipe == 'Teori dan Praktik' && Yii::$app->user->can('Dosen')): ?>
        <p></p>
        <table class="table table-bordered table-striped">
            <tr>
                <th>No</th>
                <th>Mahasiswa</th>
                <th>File</th>
            </tr>
            <?php if(!$materi->childs): ?>
            <tr>
                <td colspan="3"><i>Tidak ada data!</i></td>
            </tr>
            <?php endif ?>
            <?php foreach($materi->childs as $key => $child): ?>
            <tr>
                <td><?=++$key?></td>
                <td><?=$child->judul?></td>
                <td><?=$child->konten?></td>
            </tr>
            <?php endforeach ?>
        </table>
        <?php elseif($materi->tipe == 'Teori dan Praktik' && Yii::$app->user->can('Mahasiswa')): ?>
        <form action="<?=Url::to(['upload-tugas','dosen_pengampuh_id'=>$model->dosen_pengampuh_id,'jadwal_id'=>$model->id,'parent_id'=>$materi->id])?>" enctype="multipart/form-data" id="formUpload" method="post" class="hidden">
        <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
        <input type="hidden" name="ImportFile[tipe]" value="tipe" />
        <input type="file" class="form-control" name="ImportFile[file]" id="fileTugas" onchange="if(confirm('Apakah anda yakin akan mengupload file ini ?')){formUpload.submit()}">
        </form>
        <button class="btn btn-primary" onclick="fileTugas.click()">Upload Tugas</button>
        <p></p>
        <?php $childs = $materi->getChilds()->where(['judul'=>Yii::$app->user->identity->mahasiswa->NIM.' - '.Yii::$app->user->identity->mahasiswa->nama])->all(); ?>
        <table class="table table-bordered table-striped">
            <tr>
                <td>No</td>
                <td>File</td>
            </tr>
            <?php if(!$childs): ?>
            <tr>
                <td colspan="2"><i>Tidak ada data!</i></td>
            </tr>
            <?php endif ?>
            <?php foreach($childs as $key => $child): ?>
            <tr>
                <td><?=++$key?></td>
                <td><?=$child->konten?></td>
            </tr>
            <?php endforeach ?>
        </table>
        <?php elseif($materi->tipe == 'Kuis' && Yii::$app->user->can('Dosen')): ?>
        <br>
        <div class="panel with-nav-tabs panel-success">
            <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1success" data-toggle="tab">Soal</a></li>
                        <?php /* 
                        <li><a href="#tab4success" data-toggle="tab">Import Soal</a></li>
                        */ ?>
                        <li><a href="#tab2success" data-toggle="tab">Peserta Kuis</a></li>
                        <li><a href="#tab3success" data-toggle="tab">Waktu Kuis</a></li>
                    </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab1success">
                        <h4>Soal Kuis</h4>
                        <a href="<?=Url::to(['materi/panel-soal','dosen_pengampuh_id'=>$model->dosen_pengampuh_id,'jadwal_id'=>$model->id,'parent_id'=>$materi->id])?>" class="btn btn-success">Panel Soal</a>
                        <p></p>
                        <table class="table table-bordered">
                            <tr>
                                <td>#</td>
                                <td>Judul</td>
                                <td>Tipe Soal</td>
                                <!-- <td></td> -->
                            </tr>
                            <?php if(empty($materi->childs)): ?>
                            <tr>
                                <td colspan="4">
                                    <i>Tidak ada soal</i>
                                </td>
                            </tr>
                            <?php endif ?>
                            <?php foreach($materi->getChilds()->orderby(['no_urut'=>SORT_ASC])->all() as $key => $child): ?>
                            <tr>
                                <td><?=++$key?></td>
                                <td><?=$child->judul?></td>
                                <td>
                                    <?php if(empty($child->childs)): ?>
                                    Essay
                                    <?php else: ?>
                                    Jawaban : <?=$child->getChilds()->count()?>
                                    <?php endif ?>
                                </td>
                                <?php /*
                                <td>
                                    <a href="<?=Url::to(['materi/lihat-soal','id'=>$child->id,'jadwal_id'=>$model->id])?>">Lihat</a>
                                    |
                                    <a href="<?=Url::to(['materi/edit-soal','id'=>$child->id,'dosen_pengampuh_id'=>$model->dosen_pengampuh_id,'jadwal_id'=>$model->id,'parent_id'=>$materi->id])?>">Edit</a>
                                    |
                                    <?= Html::a('Hapus', ['materi/hapus-soal', 'id' => $child->id,'jadwal_id'=>$model->id, 'parent_id'=>$materi->id], [
                                            'data' => [
                                                'confirm' => 'Are you sure you want to delete this item?',
                                                // 'method' => 'post',
                                            ],
                                        ]) ?>
                                </td>
                                */ ?>
                            </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                    <?php /*
                    <div class="tab-pane fade" id="tab4success">
                        <form action="<?=Url::to(['materi/imports','dosen_pengampuh_id'=>$model->dosen_pengampuh_id,'jadwal_id'=>$model->id,'parent_id'=>$materi->id])?>" enctype="multipart/form-data" id="formImport" method="post" onsubmit="if(confirm('Apakah anda yakin akan mengimports soal ?')){return true}else{return false}">
                        <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                        <input type="hidden" name="ImportFile[tipe]" value="tipe" />
                        <div class="form-group">
                            <label for="">File Soal</label>
                            <input type="file" class="form-control" name="ImportFile[file]" id="fileSoal">
                        </div>
                        <button class="btn btn-primary">Import Soal</button>
                        </form>
                    </div>
                    */ ?>
                    <div class="tab-pane fade" id="tab2success">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Mahasiswa</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $peserta = Kuis::find()->where(['materi_id'=>$materi->id])->all();
                            $now = strtotime(date('Y-m-d H:i:s'));
                            $start_time = $materi->waktu?strtotime($materi->waktu->waktu_mulai):0;
                            $finish_time = $materi->waktu?strtotime($materi->waktu->waktu_selesai):0;
                            foreach($peserta as $p): ?>
                            <tr>
                                <td><?=$p->mahasiswa->nama?></td>
                                <td>
                                <?=$p->status?>
                                <?php if($p->status == 'Sedang Mengerjakan' && $now > $finish_time): ?>
                                <br>Waktu Kuis Telah Selesai
                                <?php endif ?>
                                </td>
                                <td>
                                    <?php if($p->status!='Sedang Mengerjakan' || $now > $finish_time): ?>
                                    <a href="<?=Url::to(['jadwal/hasil-kuis','id'=>$p->id,'jadwal_id'=>$model->id])?>">Lihat</a>
                                    <?php endif ?>
                                </td>
                            </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="tab3success">
                        <h3>Waktu Kuis</h2>
                        <div class="alert alert-success" role="alert" id="success" style="display:none">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            Waktu Kuis Berhasil disimpan
                        </div>
                        <input type="hidden" name="materi_id" id="materi_id" value="<?=$materi->id?>">
                        <div class="form-group">
                            <label for="">Batas Awal Mulai</label>
                            <input type="datetime-local" name="batas_awal_mulai" id="batas_awal_mulai" class="form-control" value="<?=$materi->waktu?date('Y-m-d\TH:i',strtotime($materi->waktu->waktu_mulai)):''?>">
                        </div>

                        <div class="form-group">
                            <label for="">Batas Akhir Mulai</label>
                            <input type="datetime-local" name="batas_akhir_mulai" id="batas_akhir_mulai" class="form-control" value="<?=$materi->waktu?date('Y-m-d\TH:i',strtotime($materi->waktu->waktu_selesai)):''?>">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success" onclick="simpanWaktuKuis(batas_awal_mulai.value,batas_akhir_mulai.value,materi_id.value)">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php elseif($materi->tipe == 'Kuis' && Yii::$app->user->can('Mahasiswa')): ?>
            <?php
            $kuis = Kuis::find()->where(['materi_id'=>$materi->id,'mahasiswa_id'=>Yii::$app->user->identity->mahasiswa->id])->one();
            $now = strtotime(date('Y-m-d H:i:s'));
            $start_time = $materi->waktu?strtotime($materi->waktu->waktu_mulai):0;
            $finish_time = $materi->waktu?strtotime($materi->waktu->waktu_selesai):0;

            // kondisi
            // jika belum masuk waktu kuis
            if($now < $start_time):
                ?>
                <p>Kuis Belum di mulai.</p>
                <p>Kuis akan di mulai pada <?=$materi->waktu?$materi->waktu->waktu_mulai:0?> dan selesai pada <?=$materi->waktu?$materi->waktu->waktu_selesai:0?> .</p>
                <?php
            elseif($now >= $start_time && $now <= $finish_time):
                if(empty($kuis)):
                ?>
                <p>Untuk memulai kuis, klik <a href="<?=Url::to(['jadwal/mulai-kuis','id'=>$materi->id,'jadwal_id'=>$model->id])?>">disini</a>.</p>
                <?php elseif($kuis->status == 'Sedang Mengerjakan'): ?>
                <p>Untuk melanjutkan kuis, klik <a href="<?=Url::to(['jadwal/mulai-kuis','id'=>$materi->id,'jadwal_id'=>$model->id])?>">disini</a>.</p>
                <?php elseif($kuis->status == 'Sedang Mengerjakan'): ?>
                <p>Anda telah selesai mengerjakan kuis/p>
                <?php endif;
            elseif($now > $finish_time):
                if(empty($kuis)):
                ?>
                <p>Anda tidak mengikuti kuis.</p>
                <?php else: ?>
                <p>Anda telah selesai mengerjakan kuis.</p>
                <?php
                endif; 
                ?>
            <?php
            endif;
            if((!empty($kuis) && $now > $finish_time) || (!empty($kuis) && $kuis->status != 'Sedang Mengerjakan')): ?>
                <p>Berikut adalah rangkuman kuis anda.</p>
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Soal</th>
                        <th>Jawaban Anda</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $total_skor = 0; 
                    foreach($materi->getChilds()->orderby(['no_urut'=>SORT_ASC])->all() as $soal): 
                        $jawaban = KuisJawaban::find()->where(['kuis_id'=>$kuis->id,'materi_id'=>$soal->id])->one();
                        if($kuis->status == 'Selesai Penilaian' && !empty($jawaban)) 
                            $total_skor+=$jawaban->skor;
                    ?>
                    <tr>
                        <td><?=$soal->konten?></td>
                        <td>
                            <?php if(!empty($jawaban)): ?>
                                <?=$jawaban->jawaban_konten?>
                                <p></p>
                                <?php if($kuis->status == 'Selesai Penilaian'): ?>
                                    <span class="label <?=$jawaban->skor > 0 ? 'label-success' : 'label-danger'?>">Skor : <?=$jawaban->skor?></span>
                                <?php endif ?>
                            <?php else: ?>
                                <span class="label label-danger">Tidak ada jawaban</span>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    <?php if($kuis->status == 'Selesai Penilaian'): ?>
                    <tr>
                        <td><b>Total Skor</b></td>
                        <td><b><?=number_format($total_skor/count($materi->childs),2)?></b></td>
                    </tr>
                    <?php endif ?>
                    </tbody>
                </table>
            <?php endif ?>
        <?php endif ?>

        <ul class="pager">
            <?php if($has_prev): ?>
            <li><a href="<?=Url::to(['jadwal/materi','id'=>$model->id,'index'=>$index-1])?>">Sebelumnya - <?=$materies[$index-1]->judul?></a></li>
            <?php endif ?>

            <?php if($has_next): ?>
            <li><a href="<?=Url::to(['jadwal/materi','id'=>$model->id,'index'=>$index+1])?>">Selanjutnya - <?=$materies[$index+1]->judul?></a></li>
            <?php endif ?>
        </ul>
        <?php endif ?>
    <?php else: ?>
    <center>
    <i>Tidak ada materi</i>
    </center>
    <?php endif ?>
    </div>
</div>
<script>
function simpanWaktuKuis(awal,akhir,id)
{
    document.getElementById('success').style.display = 'none';
    fetch('/jadwal/simpan-waktu-kuis?awal='+awal+'&akhir='+akhir+'&id='+id)
    document.getElementById('success').style.display = 'block';
}
</script>
