<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Jadwal */

$this->title = $model->instansi;
$this->params['breadcrumbs'][] = ['label' => 'Jadwal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="jadwal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if(Yii::$app->user->can('Dosen')): ?>
    <div class="panel with-nav-tabs panel-success">
        <div class="panel-heading">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1success" data-toggle="tab">Mahasiswa</a></li>
                <li><a href="#tab2success" data-toggle="tab">Berkas</a></li>
            </ul>
        </div>
        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1success">
                    <h4>Mahasiswa</h4>
                    <p></p>
                    <table class="table table-bordered">
                        <tr>
                            <td>#</td>
                            <td>NIM</td>
                            <td>Mahasiswa</td>
                            <td>Prodi</td>
                        </tr>
                        <?php if(empty($model->mahasiswas)): ?>
                        <tr>
                            <td colspan="4">
                                <i>Tidak ada Mahasiswa</i>
                            </td>
                        </tr>
                        <?php endif ?>
                        <?php foreach($model->mahasiswas as $key => $mahasiswa): ?>
                        <tr>
                            <td><?=++$key?></td>
                            <td><?=$mahasiswa->NIM?></td>
                            <td><?=$mahasiswa->nama?></td>
                            <td><?=$mahasiswa->prodi->nama?></td>
                        </tr>
                        <?php endforeach ?>
                    </table>
                </div>
                <div class="tab-pane fade" id="tab2success">
                    <h4>Berkas</h4>
                    <p></p>
                    <table class="table table-bordered">
                        <tr>
                            <td>#</td>
                            <td>NIM</td>
                            <td>Mahasiswa</td>
                            <td>Prodi</td>
                            <td>File Mahasiswa</td>
                            <td>File Koreksi</td>
                            <td>Keterangan</td>
                            <td></td>
                        </tr>
                        <?php if(empty($model->files)): ?>
                        <tr>
                            <td colspan="7">
                                <i>Tidak ada Berkas</i>
                            </td>
                        </tr>
                        <?php endif ?>
                        <?php foreach($model->files as $key => $file): ?>
                        <tr>
                            <td><?=++$key?></td>
                            <td><?=$file->mahasiswa->NIM?></td>
                            <td><?=$file->mahasiswa->nama?></td>
                            <td><?=$file->mahasiswa->prodi->nama?></td>
                            <td>
                            <?= Html::a('Download Berkas',Yii::$app->params['frontend_url']."/uploads/".$file->file_url) ?>
                            </td>
                            <td>
                            <?php if(empty($file->file_koreksi_url)):?>
                                <i>Belum dikoreksi</i>
                            <?php else: ?>
                                <?= Html::a('Download Berkas',Yii::$app->params['frontend_url']."/uploads/".$file->file_koreksi_url) ?>
                            <?php endif ?>
                            </td>
                            <td>
                            <?php if(empty($file->file_koreksi_url)):?>
                                <i>Belum dikoreksi</i>
                            <?php else: ?>
                                <?=$file->keterangan?>
                            <?php endif ?>
                            </td>
                            <td>
                            <?php if(empty($file->file_koreksi_url)):?>
                            <?= Html::a('Koreksi',['jadwal/koreksi','id'=>$file->id],['class'=>'btn btn-primary']) ?>
                            <?php endif ?>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="table-responsive">
        <h4>Berkas</h4>
        <div class="hidden">
        <form action="<?=Url::to(['jadwal/upload-berkas'])?>" enctype="multipart/form-data" id="formUpload" method="post">
        <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
        <input type="hidden" name="PraktekFile[praktek_id]" value="<?=$model->id?>" />
        <input type="file" class="form-control" name="PraktekFile[file_url]" id="berkas" onchange="if(confirm('Apakah anda yakin akan mengupload berkas ?')){formUpload.submit()}">
        </form>
        </div>
        <button class="btn btn-primary" onclick="berkas.click()">Upload Berkas</button>
        <p></p>
        <table class="table table-bordered">
            <tr>
                <td>#</td>
                <td>File</td>
                <td>File Koreksi</td>
                <td>Dikoreksi Oleh</td>
                <td>Keterangan</td>
            </tr>
            <?php if(empty($model->getFiles()->where(['mahasiswa_id'=>Yii::$app->user->identity->mahasiswa->id])->all())): ?>
            <tr>
                <td colspan="7">
                    <i>Tidak ada Berkas</i>
                </td>
            </tr>
            <?php endif ?>
            <?php foreach($model->getFiles()->where(['mahasiswa_id'=>Yii::$app->user->identity->mahasiswa->id])->all() as $key => $file): ?>
            <tr>
                <td><?=++$key?></td>
                <td>
                <?= Html::a('Download Berkas',Yii::$app->params['frontend_url']."/uploads/".$file->file_url) ?>
                </td>
                <td>
                <?php if(empty($file->file_koreksi_url)):?>
                    <i>Belum dikoreksi</i>
                <?php else: ?>
                    <?= Html::a('Download Berkas',Yii::$app->params['frontend_url']."/uploads/".$file->file_koreksi_url) ?>
                <?php endif ?>
                </td>
                <td>
                <?php if(empty($file->file_koreksi_url)):?>
                    <i>Belum dikoreksi</i>
                <?php else: ?>
                    <?=$file->dosen->nama?>
                <?php endif ?>
                </td>
                <td>
                <?php if(empty($file->file_koreksi_url)):?>
                    <i>Belum dikoreksi</i>
                <?php else: ?>
                    <?=$file->keterangan?>
                <?php endif ?>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
    <?php endif ?>

</div>
