<?php

use common\models\Kuis;
use common\models\KuisJawaban;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Jadwal */

$this->title = "Hasil Kuis - ". $model->mahasiswa->nama;
$this->params['breadcrumbs'][] = ['label' => 'Jadwal', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Materi - '.$model->materi->dosenPengampuh->mataKuliah->nama.' - '.$model->materi->dosenPengampuh->kelas->nama, 'url' => ['materi','id'=>$jadwal_id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<style>
div[data-oembed-url] div {
    max-width: 100%!important;
}
</style>
<div class="jadwal-view">

    <h2 align="center"><?= Html::encode($this->title) ?></h2>
    <br><br>
    <!-- <div class="col-sm-12 col-md-3">
        <center>
            <img src="<?=Yii::$app->params['frontend_url']?>/images/<?=$model->mahasiswa->jenis_kelamin?>.jpg" alt="<?=$model->mahasiswa->nama?>" width="100%">
            <b><?=$model->mahasiswa->nama?></b><br>
            <p><?=$model->mahasiswa->NIM?></p>
        </center>
    </div> -->

    <div class="col-sm-12">
        <?php if($model->status == 'Selesai'): ?>
        <form method="post">
        <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
        <?php endif ?>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Soal</th>
                <th>Jawaban Mahasiswa</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $total_skor = 0; 
            foreach($materi->getChilds()->orderby(['no_urut'=>SORT_ASC])->all() as $soal): 
                $jawaban = KuisJawaban::find()->where(['kuis_id'=>$model->id,'materi_id'=>$soal->id])->one();
                if($model->status == 'Selesai Penilaian' && !empty($jawaban)) 
                    $total_skor+=$jawaban->skor;
            ?>
            <tr>
                <td><?=$soal->konten?></td>
                <td>
                    <?php if(!empty($jawaban)): ?>
                        <?=$jawaban->jawaban_konten?>
                        <p></p>
                        <?php if($jawaban->jawaban_id != NULL): ?>
                            <span class="label <?=$jawaban->skor == 1 ? 'label-success' : 'label-danger'?>">Skor : <?=$jawaban->skor?></span>
                        <?php else: ?>
                            <?php if($model->status == 'Selesai Penilaian'): ?>
                            <span class="label <?=$jawaban->skor == 0 ? 'label-danger' : 'label-success'?>">Skor : <?=$jawaban->skor?></span>
                            <?php else: ?>
                            <div class="form-group">
                                <input type="number" class="form-control" step="any" min="0" max="1" name="kuis_jawaban[<?=$jawaban->id?>]" value="0">
                            </div>
                            <?php endif ?>
                        <?php endif ?>
                    <?php else: ?>
                        <span class="label label-danger">Tidak ada jawaban</span>
                    <?php endif ?>
                </td>
            </tr>
            <?php endforeach ?>
            <?php if($model->status == 'Selesai Penilaian'): ?>
            <tr>
                <td><b>Total Skor</b></td>
                <td><b><?=number_format($total_skor/count($materi->childs),2)?></b></td>
            </tr>
            <?php endif ?>
            </tbody>
        </table>
        <?php if($model->status == 'Selesai'): ?>
        <button class="btn btn-success">Simpan Penilaian</button>
        </form>
        <?php endif ?>
    </div>
</div>
