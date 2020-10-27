<?php

use common\models\Kuis;
use common\models\KuisJawaban;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Jadwal */

$this->title = 'e-Skripsi - List Judul';
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="jadwal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="col-sm-12 col-md-3">
        <?php include "navigasi.php" ?>
    </div>

    <div class="col-sm-12 col-md-9">
        <p>
            <?= Html::a('Ajukan Seminar',['e-skripsi/pengajuan-seminar'],['class'=>'btn btn-success']) ?>
        </p>

        <table class="table">
            <tr>
                <td><b>Judul<b></td>
                <td>&nbsp; : &nbsp;</td>
                <td><?=$mahasiswa->accPengajuan->judul?></td>
            </tr>
            <tr>
                <td><b>Dosen Pembimbing</b></td>
                <td>&nbsp; : &nbsp;</td>
                <td>
                    <?= implode("<br>", ArrayHelper::map($mahasiswa->pembimbings,'id','nama'))?>
                </td>
            </tr>
        </table>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Berkas</th>
                        <th>Dosen Penguji</th>
                        <th>Nilai Yang Di Harapkan</th>
                        <th>Nilai Yang Di Dapat</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($mahasiswa->seminars)): ?>
                    <tr>
                        <td colspan="6"><i>Tidak ada pengajuan!</i></td>
                    </tr>
                    <?php endif ?>
                    <?php foreach($mahasiswa->seminars as $k => $p): ?>
                    <tr>
                        <td><?=++$k?></td>
                        <td>
                        <?= Html::a('Download Berkas',Yii::$app->params['frontend_url']."/uploads/".$p->file_url) ?>
                        </td>
                        <td>
                        <?php if($p->seminarPengujis): ?>
                            <?= implode("<br>", ArrayHelper::map($p->pengujis,'id','nama'))?>
                        <?php else: ?>
                            <i>Belum ada penguji</i>
                        <?php endif ?>
                        </td>
                        <td><?=$p->nilai_harapan?></td>
                        <td>
                        <?php if($p->nilai_didapat): ?>
                        <?=$p->nilai_didapat?>
                        <?php else: ?>
                        <i>Belum dinilai</i>
                        <?php endif ?>
                        </td>
                        <td>
                        <?php if($p->tanggal): ?>
                            <?=$p->tanggal?>
                        <?php else: ?>
                            <i>Belum ada jadwal</i>
                        <?php endif ?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>