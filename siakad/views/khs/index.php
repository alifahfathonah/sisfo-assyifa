<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MahasiswaKhsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kartu Hasil Studi';
$this->params['breadcrumbs'][] = $this->title;
if(!isset($cetak_url['MahasiswaKrsSearch']))
    $cetak_url['MahasiswaKhsSearch']['id_periode'] = $searchModel->id_periode;
array_unshift($cetak_url, 'print');
?>
<div class="mahasiswa-khs-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="search-form">
        <form action="">
            <div class="form-group">
                <label for="">Periode</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="MahasiswaKhsSearch[id_periode]" placeholder="Contoh : 20151" value="<?=$searchModel->id_periode?>">
                    <div class="input-group-btn">
                        <button class="btn btn-primary">Go</button>
                    </div>
                    <div class="input-group-btn">
                        <a href="<?=Url::to($cetak_url)?>" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?= GridView::widget([
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
            ],

            [
                'attribute'=>'Nilai Angka',
                'value'=>'nilai_angka',
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
            ],
            //'id_kelas',
            // 'nama_kelas_kuliah',
            
            //'nim',
            //'nama_mahasiswa',
            //'angkatan',
        ],
    ]); ?>


</div>
