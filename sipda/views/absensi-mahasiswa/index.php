<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AbsensiMahasiswaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Absensi Mahasiswa '.$model->jadwal->hari.' - '.$model->jadwal->dosenPengampuh->mataKuliah->nama;
$this->params['breadcrumbs'][] = ['label' => 'Absensi', 'url' => ['absensi/index']];
$this->params['breadcrumbs'][] = ['label' => $model->jadwal->hari.' - '.$model->jadwal->dosenPengampuh->mataKuliah->nama, 'url' => ['absensi/view','id'=>$model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="absensi-mahasiswa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="table-responsive">
    <?php $form = ActiveForm::begin(['action'=>['absensi-mahasiswa/create','absensi_id'=>$model->id]]); ?>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Mahasiswa</th>
            <th>Status</th>
        </tr>
        <?php foreach($mahasiswa as $key => $mhs): ?>
        <tr>
            <td><?=++$key?></td>
            <td><?=$mhs->NIM?></td>
            <td><?=$mhs->nama?></td>
            <td>
            <?= Html::radioList('status['.$mhs->id.']',isset($absensi[$mhs->id]) ? $absensi[$mhs->id] : 'Tanpa Keterangan',[
                'Hadir' => 'Hadir',
                'Sakit' => 'Sakit',
                'Izin' => 'Izin',
                'Tanpa Keterangan' => 'Tanpa Keterangan',
            ]) ?>
            </td>
        </tr>
        <?php endforeach ?>
    </table>

    <button class="btn btn-success">Simpan</button>
    <a href="<?= Url::to(['absensi-mahasiswa/cetak','absensi_id'=>$model->id]) ?>" class="btn btn-primary">Cetak</a>

    <?php ActiveForm::end(); ?>
    </div>


</div>
