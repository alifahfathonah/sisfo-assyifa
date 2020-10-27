<?php

use common\models\Kuis;
use common\models\KuisJawaban;
use yii\helpers\Html;
use yii\helpers\Url;
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
                        <th>Judul</th>
                        <th>Berkas</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($mahasiswa->pengajuanSkripsi)): ?>
                    <tr>
                        <td colspan="4"><i>Tidak ada pengajuan!</i></td>
                    </tr>
                    <?php endif ?>
                    <?php foreach($mahasiswa->pengajuanSkripsi as $k => $p): ?>
                    <tr>
                        <td><?=++$k?></td>
                        <td><?=$p->judul?></td>
                        <td>
                        <?= Html::a('Download Berkas',Yii::$app->params['frontend_url']."/uploads/".$p->file_url) ?>
                        </td>
                        <td><?=$p->status?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>