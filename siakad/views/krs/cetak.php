<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MahasiswaKrsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kartu Rencana Studi (KRS)';
$this->params['breadcrumbs'][] = $this->title;
$last_semester = substr($searchModel->id_periode,4,1);
$tahun = substr($searchModel->id_periode,0,4);
$mahasiswa = Yii::$app->user->identity->mahasiswa;
$angkatan = $mahasiswa->angkatan->tahun;
$angkatan = substr($angkatan,0,4);
$semester = ($tahun-$angkatan)+1;
$tahun = $tahun.'/'.($tahun+1);
$maps = [
    1=>[
        1=>1,
        2=>2
    ],
    2=>[
        1=>3,
        2=>4
    ],
    3=>[
        1=>5,
        2=>6
    ],
    4=>[
        1=>7,
        2=>8
    ]
];

$semester = $maps[$semester][$last_semester];
?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
th, td {
    padding:5px;
}
</style>

<div class="mahasiswa-krs-index" style="padding:15px;">
    <table width="100%">
        <tr>
            <td width="200px">
                <center>
                <img src="<?= Url::to(['images/logo.png'])?>" alt="" width="200px">
                </center>
            </td>
            <td>
                <div class="text-center">
                    <h2 style="padding:0;margin:0;">SEKOLAH TINGGI ILMU KESEHATAN</h2>
                    <h1 style="padding:0;margin:0;">AS SYIFA - KISARAN</h1>
                    <p>Jln. SKB/Pendidikan Lk.IV Kel.Kisaran Naga Kec. Kisaran Timur Kab. Asahan<br>Telp. (0623) 4562044<br><a href="http://stikes-assyifa.ac.id">www.Stikes-assyifa.ac.id</a></p>
                </div>
            </td>
        </tr>
    </table>
    <hr>
    <center>
    <h3><?= Html::encode($this->title) ?></h3>
    <h4>Tahun Akademik <?=$tahun?></h4>
    </center>

    <table width="100%">
        <tr>
            <td width="20%">Nama Peserta Didik</td>
            <td width="5%">&nbsp;:&nbsp;</td>
            <td><?=$mahasiswa->nama?></td>
        </tr>
        <tr>
            <td>Nomor Induk Mahasiswa</td>
            <td>&nbsp;:&nbsp;</td>
            <td><?=$mahasiswa->NIM?></td>
        </tr>
        <tr>
            <td>Angkatan Tahun</td>
            <td>&nbsp;:&nbsp;</td>
            <td><?=$mahasiswa->angkatan->tahun?></td>
        </tr>
        <tr>
            <td>Semester</td>
            <td>&nbsp;:&nbsp;</td>
            <td><?=$semester?></td>
        </tr>
        <tr>
            <td>Pembimbing Akademik</td>
            <td>&nbsp;:&nbsp;</td>
            <td><?=$mahasiswa->pembimbingAkademis?$mahasiswa->pembimbingAkademis->dosen->nama:''?></td>
        </tr>
    </table>
    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'summary'=>'',
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'id_registrasi_mahasiswa',
            // 'id_periode',
            // 'id_prodi',
            // 'nama_program_studi',
            //'id_matkul',
            [
                'attribute'=>'Kode',
                'value'=>'kode_mata_kuliah',
            ],
            [
                'attribute'=>'Mata Kuliah',
                'value'=>'nama_mata_kuliah',
            ],
            [
                'attribute'=>'nama_dosen',
                'format'=>'raw',
                'value'=>function($model){
                    $nama_dosen = $model->kelas?$model->kelas->nama_dosen:'';
                    // $nama_dosen = explode(",",$nama_dosen);
                    return str_replace(',','<br>',$nama_dosen);
                }
            ],
            //'id_kelas',
            // 'nama_kelas_kuliah',
            [
                'attribute'=>'Bobot Studi',
                'value'=>'sks_mata_kuliah',
            ]
            //'nim',
            //'nama_mahasiswa',
            //'angkatan',
        ],
    ]); ?>

    <b>Catatan Pembimbing Akademi :</b>
    <p></p>
    <br>
    <p>............................................................................................................................</p>
    <br>
    <p>............................................................................................................................</p>

    <div class="clearfix"></div>

    <table width="100%">
    <tr>
        <td width="50%">
            <div class="text-center">
                <br>
                <b>Pembimbing Akademik</b>
                <br>
                <br>
                <br>
                <br>
                <br>
                <b>( <?=$mahasiswa->pembimbingAkademis?$mahasiswa->pembimbingAkademis->dosen->nama:''?> )</b><br>
                <b>NIDN : <?=$mahasiswa->pembimbingAkademis?$mahasiswa->pembimbingAkademis->dosen->NIDN:''?></b>
            </div>
        </td>
        <td width="50%">
            <div class="text-center">
                <b>Kisaran, <?= date('d F Y') ?></b><br>
                <b>Peserta Didik</b>
                <br>
                <br>
                <br>
                <br>
                <br>
                <b>( <?=$mahasiswa->nama?> )</b><br>
                <b>NIM : <?=$mahasiswa->NIM?></b>
            </div>
        </td>
    </tr>
        
        
    </div>

</div>
<script>
window.print()
</script>