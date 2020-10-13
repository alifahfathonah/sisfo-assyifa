<?php

use common\models\Kuis;
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
                    <b><?=$m->judul?></b>
                    <?php else: ?>
                        <?=$m->judul?>
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
        <?php if($materi->tipe_konten == 'Teks'): ?>
        <?=$materi->konten?>
        <?php elseif($materi->tipe_konten == 'PDF'): ?>
            <iframe src="<?=$materi->konten?>" height="500px" width="100%"></iframe>
        <?php endif ?>

        <?php if($materi->tipe == 'Kuis' && Yii::$app->user->can('Dosen')): ?>
        <br>
        <div class="panel with-nav-tabs panel-success">
            <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1success" data-toggle="tab">Soal</a></li>
                        <li><a href="#tab2success" data-toggle="tab">Peserta Kuis</a></li>
                    </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab1success">
                        <h4>Soal Kuis</h4>
                        <a href="<?=Url::to(['materi/buat-soal','dosen_pengampuh_id'=>$model->dosen_pengampuh_id,'jadwal_id'=>$model->id,'parent_id'=>$materi->id])?>" class="btn btn-success">Buat Soal</a>
                        <p></p>
                        <table class="table table-bordered">
                            <tr>
                                <td>#</td>
                                <td>Judul</td>
                                <td>Tipe Soal</td>
                                <td></td>
                            </tr>
                            <?php if(empty($materi->childs)): ?>
                            <tr>
                                <td colspan="3">
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
                            </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="tab2success">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Mahasiswa</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $peserta = Kuis::find()->where(['materi_id'=>$materi->id])->all();
                            foreach($peserta as $p): ?>
                            <tr>
                                <td><?=$p->mahasiswa->nama?></td>
                                <td><?=$p->status?></td>
                            </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php elseif($materi->tipe == 'Kuis' && Yii::$app->user->can('Mahasiswa')): ?>
            <?php
            $kuis = Kuis::find()->where(['materi_id'=>$materi->id,'mahasiswa_id'=>Yii::$app->user->identity->mahasiswa->id])->one();
            if(empty($kuis)):
            ?>
            <p>Untuk memulai kuis, klik <a href="<?=Url::to(['jadwal/mulai-kuis','id'=>$materi->id,'jadwal_id'=>$model->id])?>">disini</a>.</p>
            <?php elseif($kuis->status == 'Sedang Mengerjakan'): ?>
            <p>Untuk melanjutkan kuis, klik <a href="<?=Url::to(['jadwal/mulai-kuis','id'=>$materi->id,'jadwal_id'=>$model->id])?>">disini</a>.</p>
            <?php else: ?>
            <p>Anda telah selesai mengerjakan kuis. berikut adalah rangkuman kuis anda.</p>

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Soal</th>
                    <th>Jawaban Anda</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($kuis->kuisJawabans as $jawaban): ?>
                <tr>
                    <td><?=$jawaban->materi->konten?></td>
                    <td><?=$jawaban->jawaban_konten?></td>
                </tr>
                </tbody>
                <?php endforeach ?>
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
