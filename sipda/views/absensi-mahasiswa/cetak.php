<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AbsensiMahasiswaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<link href="/assets/8f7fef9b/css/bootstrap.css" rel="stylesheet">
<style>
table {
    font-size:12px;
}
</style>
<div style="margin:30px;">
    <?php /*
    <img src="<?=Url::to(['images/logo.png'])?>" height="100px" style="position:absolute;">
    <div>
        <center>
        <h3>SEKOLAH TINGGI ILMU KESEHATAN AS-SYIFA</h3>
        <h4>KABUPATEN ASAHAN</h4>
        </center>
    </div>
    <hr>
    */ ?>
    <center>
        <h4 style="margin:0;">ABSENSI MAHASISWA</h4>
        <h4 style="margin:0;"><u>PRODI <?=$model->jadwal->dosenPengampuh->mataKuliahProdi->prodi->jenjang?> <?=$model->jadwal->dosenPengampuh->mataKuliahProdi->prodi->nama?> STIKES AS SYIFA KISARAN</u></h4>
        <br>
    </center>
    <table>
        <tr>
            <td>
            <b>Kelas</b>
            </td>
            <td>&nbsp;:&nbsp;</td>
            <td><?=$model->jadwal->dosenPengampuh->kelas->nama?></td>
        </tr>
        <tr>
            <td>
            <b>Mata Kuliah</b>
            </td>
            <td>&nbsp;:&nbsp;</td>
            <td><?=$model->jadwal->dosenPengampuh->mataKuliah->nama?></td>
        </tr>
        <tr>
            <td>
            <b>Pertemuan Ke</b>
            </td>
            <td>&nbsp;:&nbsp;</td>
            <td><?=$model->pertemuan?></td>
        </tr>
        <tr>
            <td>
            <b>Dosen Pengampuh</b>
            </td>
            <td>&nbsp;:&nbsp;</td>
            <td><?=$model->jadwal->dosenPengampuh->dosen->nama?></td>
        </tr>
        <tr>
            <td>
            <b>T.A / Semester</b>
            </td>
            <td>&nbsp;:&nbsp;</td>
            <td><?=$model->jadwal->dosenPengampuh->mataKuliahProdi->tahunAkademik->tahun.' '.$model->jadwal->dosenPengampuh->mataKuliahProdi->tahunAkademik->periode?></td>
        </tr>
    </table>
    <p></p>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Mahasiswa</th>
            <th>Status</th>
        </tr>
        <?php foreach($model->absensiMahasiswas as $key => $absensi): ?>
        <tr>
            <td><?=++$key?></td>
            <td><?=$absensi->mahasiswa->NIM?></td>
            <td><?=$absensi->mahasiswa->nama?></td>
            <td><?=$absensi->status?></td>
        </tr>
        <?php endforeach ?>
    </table>
    <p></p>
    <br><br>
    <table class="table">
        <tr>
            <td>
                Kisaran, <?= date('Y-m-d') ?>
            </td>
        </tr>
        <tr>
            <td>
                STIKES As Syifa Kisaran<br>
                Dosen Pengampuh
                <br><br><br><br>
                (<u><?=$model->jadwal->dosenPengampuh->dosen->nama?></u>)<br>
                <b>NIDN : <?=$model->jadwal->dosenPengampuh->dosen->NIDN?></b>
            </td>
        </tr>
    </table>
</div>
<script>
window.print()
</script>