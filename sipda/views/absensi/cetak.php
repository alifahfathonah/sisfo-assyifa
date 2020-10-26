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
table th {
    text-align:center;
    vertical-align:middle!important;
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
        <h4 style="margin:0;"><u>PRODI <?=$jadwal->dosenPengampuh->mataKuliahProdi->prodi->jenjang?> <?=$jadwal->dosenPengampuh->mataKuliahProdi->prodi->nama?> STIKES AS SYIFA KISARAN</u></h4>
        <br>
    </center>
    <table>
        <tr>
            <td>
            <b>Kelas</b>
            </td>
            <td>&nbsp;:&nbsp;</td>
            <td><?=$jadwal->dosenPengampuh->kelas->nama?></td>
        </tr>
        <tr>
            <td>
            <b>Mata Kuliah</b>
            </td>
            <td>&nbsp;:&nbsp;</td>
            <td><?=$jadwal->dosenPengampuh->mataKuliah->nama?></td>
        </tr>
        <tr>
            <td>
            <b>Dosen Pengampuh</b>
            </td>
            <td>&nbsp;:&nbsp;</td>
            <td><?=$jadwal->dosenPengampuh->dosen->nama?></td>
        </tr>
        <tr>
            <td>
            <b>T.A / Semester</b>
            </td>
            <td>&nbsp;:&nbsp;</td>
            <td><?=$jadwal->dosenPengampuh->mataKuliahProdi->tahunAkademik->tahun.' '.$jadwal->dosenPengampuh->mataKuliahProdi->tahunAkademik->periode?></td>
        </tr>
    </table>
    <p></p>
    <table class="table table-bordered">
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">NIM</th>
            <th rowspan="2">Mahasiswa</th>
            <th colspan="<?=count($model)?>">PERTEMUAN</th>
            <th rowspan="2">% Hadir</th>
        </tr>
        <tr>
            <?php foreach($model as $absensi): ?>
            <th><?=$absensi->pertemuan?></th>
            <?php endforeach ?>
        </tr>
        <?php foreach($mahasiswa as $key => $mhs): ?>
        <tr>
            <td><?=++$key?></td>
            <td><?=$mhs->NIM?></td>
            <td><?=$mhs->nama?></td>
            <?php 
            $presentase = 0;
            $max_pertemuan = count($model)*2;
            foreach($model as $absensi):
                $absensi_mahasiswa = $absensi->getAbsensiMahasiswas()->where(['mahasiswa_id'=>$mhs->id])->one(); 
                $presentase += $range[$absensi_mahasiswa->status];
            ?>
            <th><?=$range[$absensi_mahasiswa->status]?></th>
            <?php endforeach ?>
            <td><?= number_format($presentase/$max_pertemuan*100) ?></td>
        </tr>
        <?php endforeach ?>
    </table>
    <p></p>
    <br><br>
    <table class="table">
        <tr>
            <td style="text-align:right;border-top:0px;" colspan="2">
                Kisaran, <?= date('Y-m-d') ?>
            </td>
        </tr>
        <tr>
            <td style="text-align:right;border-top:0px;" colspan="2">
                STIKES As Syifa Kisaran
            </td>
        </tr>
        <tr>
            <td style="border-top:0px;">
                Waket I
                <br><br><br><br>
                (.........................)<br>
                <b>NIDN : ....................</b>
            </td>

            <td style="text-align:right;border-top:0px;">
                Ket. Prodi
                <br><br><br><br>
                (.........................)<br>
                <b>NIDN : ....................</b>
            </td>
        </tr>
    </table>
</div>
<script>
window.print()
</script>