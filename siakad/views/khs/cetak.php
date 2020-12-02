<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use common\models\StrukturOrganisasi;

$wakil = StrukturOrganisasi::findOne(['jabatan'=>'Wakil Ketua']);

/* @var $this yii\web\View */
/* @var $searchModel common\models\MahasiswaKrsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kartu Hasil Studi (KHS)';
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
                    <h2 style="margin:0px;padding:0px;">SEKOLAH TINGGI ILMU KESEHATAN</h2>
                    <h1 style="margin:0px;padding:0px;">AS SYIFA - KISARAN</h1>
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
    </table>
    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'summary'=>'',
        'showFooter'=>TRUE,
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'Mata Kuliah',
                'value'=>'nama_mata_kuliah',
            ],
            [
                'attribute'=>'Kode',
                'value'=>function($model){
                    return $model->kelas?$model->kelas->kode_mata_kuliah:'-';
                },
            ],
            
            [
                'attribute'=>'Bobot Studi',
                'value'=>'sks_mata_kuliah',
                'footer' => "SKS : <b>".$sks."</b>"
            ],

            [
                'attribute'=>'Nilai Angka',
                'value'=>'nilai_angka',
                'footer' => "IPK : <b>".$ipk."</b>"
            ],

            [
                'attribute'=>'Nilai Huruf',
                'value'=>'nilai_huruf',
            ],

            [
                'attribute'=>'Bobot dan Nilai',
                'value'=>function($model){
                    return number_format($model->nilai_angka*$model->sks_mata_kuliah,2);
                },
                'footer' => "Total : <b>".$total."</b>"
            ],
            //'id_kelas',
            // 'nama_kelas_kuliah',
            
            //'nim',
            //'nama_mahasiswa',
            //'angkatan',
        ],
    ]); ?>

    <div class="clearfix"></div>

    <table width="100%">
    <tr>
        <td width="50%">
            <div class="text-center">
                <br>
                <br>
                <b>Waket Akademi</b>
                <br>
                <br>
                <br>
                <br>
                <br>
                <b>( <?=$wakil->dosen->nama?> )</b><br>
                <b>NIDN : <?=$wakil->dosen->NIDN?></b>
            </div>
        </td>
        <td width="50%">
            <div class="text-center">
                <b>Kisaran, <?= date('d F Y') ?></b><br>
                <b>STiKes As Syifa</b>
                <br>
                <b>Ka. Prodi <?=$mahasiswa->prodi->nama?></b>
                <br>
                <br>
                <br>
                <br>
                <br>
                <b>( <?=$mahasiswa->prodi->dosen?$mahasiswa->prodi->dosen->nama:''?> )</b><br>
                <b>NIDN : <?=$mahasiswa->prodi->dosen?$mahasiswa->prodi->dosen->NIDN:''?></b>
            </div>
        </td>
    </tr>
        
        
    </div>

</div>
<script>
window.print()
</script>