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

    <div class="col-sm-12">

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mahasiswa</th>
                        <th>Judul</th>
                        <th>Berkas</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($dosen->pembimbings)): ?>
                    <tr>
                        <td colspan="5"><i>Tidak ada data!</i></td>
                    </tr>
                    <?php endif ?>
                    <?php foreach($dosen->pembimbings as $k => $p): ?>
                    <tr>
                        <td><?=++$k?></td>
                        <td><?=$p->mahasiswa->nama?></td>
                        <td><?=$p->mahasiswa->accPengajuan?$p->mahasiswa->accPengajuan->judul:'<i>Belum ada judul di acc</i>'?></td>
                        <td>
                        <?php if($p->mahasiswa->accPengajuan): ?>
                        <?= Html::a('Download Berkas',Yii::$app->params['frontend_url']."/uploads/".$p->mahasiswa->accPengajuan->file_url) ?>
                        <?php else: ?>
                            <i>Belum ada judul di acc</i>
                        <?php endif ?>
                        </td>
                        <td><?=$p->status?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>