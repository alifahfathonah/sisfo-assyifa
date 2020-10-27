<?php

use common\models\Kuis;
use common\models\KuisJawaban;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Jadwal */

$this->title = 'e-Skripsi - Dosen Pembimbing';
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="jadwal-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <div class="col-sm-12 col-md-3">
        <?php include "navigasi.php" ?>
    </div>

    <div class="col-sm-12 col-md-9">
        <?php if(!$mahasiswa->accPengajuan): ?>
        <p>
            <?= Html::a('Ajukan Judul',['e-skripsi/pengajuan'],['class'=>'btn btn-success']) ?>
        </p>
        <?php endif ?>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIDN</th>
                        <th>Nama Dosen</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($mahasiswa->pembimbings)): ?>
                    <tr>
                        <td colspan="4"><i>Tidak ada pengajuan!</i></td>
                    </tr>
                    <?php endif ?>
                    <?php foreach($mahasiswa->pembimbings as $k => $p): ?>
                    <tr>
                        <td><?=++$k?></td>
                        <td><?=$p->NIDN?></td>
                        <td><?=$p->nama?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>