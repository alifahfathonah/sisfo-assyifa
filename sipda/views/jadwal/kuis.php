<?php

use common\models\Kuis;
use common\models\KuisJawaban;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Jadwal */

$this->title = 'Kuis - '.$model->dosenPengampuh->mataKuliah->nama.' - '.$model->dosenPengampuh->kelas->nama;
$this->params['breadcrumbs'][] = ['label' => 'Jadwal', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Materi - '.$model->dosenPengampuh->mataKuliah->nama.' '.$model->dosenPengampuh->kelas->nama, 'url' => ['jadwal/materi','id'=>$jadwal_id]];
$this->params['breadcrumbs'][] = ['label' => $model->judul, 'url' => ['jadwal/materi','id'=>$jadwal_id,'index'=>$model->no_urut-1]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="jadwal-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <div class="col-sm-12 col-md-3">
        <?php if(Yii::$app->user->can('Dosen')): ?>
        <a href="<?=Url::to(['materi/buat-soal','dosen_pengampuh_id'=>$model->doesnPengampuh->id,'jadwal_id'=>$jadwal_id,'parent_id'=>$materi->id])?>" class="btn btn-success">Buat Soal</a>
        <p></p>
        <?php endif ?>
        <ul class="list-group">
            <li class="list-group-item">
                <b>Soal Kuis</b> 
            </li>
        <?php foreach($materies as $key => $m): if(!Yii::$app->user->can('Dosen') && $m->status == 'Private') continue; ?>
            <li class="list-group-item">
                <a href="<?=Url::to(['jadwal/kuis','jadwal_id'=>$jadwal_id,'id'=>$model->id,'index'=>$key])?>">
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
        
        <h3><?=$materi->judul?></h3>
        <?=$materi->konten?>
        
        <?php
        $kuis = Kuis::find()->where(['materi_id'=>$model->id,'mahasiswa_id'=>Yii::$app->user->identity->mahasiswa->id])->one();
        $kuisJawaban = KuisJawaban::find()->where(['kuis_id'=>$kuis->id,'materi_id'=>$materi->id])->one();
        ?>
        <?php if(!empty($materi->childs)): ?>
        <?php 
        foreach($materi->childs as $answer): 
        ?>
        <div class="inputGroup col-sm-12 col-md-6" style="margin:0;padding:0;padding-right:10px;">
            <input id="radio<?=$answer->id?>" onchange="simpanJawaban(<?=$answer->id?>,<?=$materi->id?>,'')" name="answers[<?=$materi->id?>]" type="radio" value="<?= $answer->id ?>" <?=$kuisJawaban && $kuisJawaban->jawaban_id == $answer->id ? 'checked=""' : '' ?>/>
            <label for="radio<?=$answer->id?>"><?= $answer->konten ?></label>
        </div>
        <?php endforeach ?>
        <?php else: ?>
            <div class="form-group">
                <b>Jawaban</b>
                <textarea name="answer[<?=$materi->id?>]" id="jawaban<?=$materi->id?>" class="form-control"><?=$kuisJawaban?$kuisJawaban->jawaban_konten:''?></textarea>
            </div>
            <div class="form-group">
                <div class="alert alert-success" role="alert" id="success" style="display:none">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Jawaban tersimpan
                </div>
                <button class="btn btn-success" onclick="simpanJawaban(0,<?=$materi->id?>,jawaban<?=$materi->id?>.value)">Simpan Jawaban</button>
            </div>
        <?php endif ?>

        <div class="clearfix"></div>

        <ul class="pager">
            <?php if($has_prev): ?>
            <li><a href="<?=Url::to(['jadwal/kuis','id'=>$model->id,'jadwal_id'=>$jadwal_id,'index'=>$index-1])?>">Sebelumnya - <?=$materies[$index-1]->judul?></a></li>
            <?php endif ?>

            <?php if($has_next): ?>
            <li><a href="<?=Url::to(['jadwal/kuis','id'=>$model->id,'jadwal_id'=>$jadwal_id,'index'=>$index+1])?>">Selanjutnya - <?=$materies[$index+1]->judul?></a></li>
            <?php else: ?>
                <li><a href="<?=Url::to(['jadwal/selesai-kuis','id'=>$model->id,'jadwal_id'=>$jadwal_id])?>">Selesai</a></li>
            <?php endif ?>
        </ul>
        <?php endif ?>
    <?php else: ?>
    <center>
    <i>Tidak ada soal</i>
    </center>
    <?php endif ?>
    </div>
</div>
<script>
function simpanJawaban(jawaban_id,soal_id,jawaban='')
{
    fetch('/jadwal/simpan-jawaban?soal_id='+soal_id+'&jawaban_id='+jawaban_id+'&jawaban='+jawaban)
    document.getElementById('success').style.display = 'block';
}
</script>