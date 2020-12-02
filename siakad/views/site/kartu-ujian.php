<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MahasiswaKrsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kartu Ujian';
$this->params['breadcrumbs'][] = $this->title;
$cetak_url = Yii::$app->request->queryParams;
array_unshift($cetak_url, 'print');
?>
<div class="mahasiswa-krs-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="search-form">
        <form action="">
            <div class="form-group">
                <label for="">Periode</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="periode" placeholder="Contoh : 20151" value="<?=$searchModel?$searchModel->id_periode:''?>">
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

    <?php if($searchModel): ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'id_registrasi_mahasiswa',
            // 'id_periode',
            // 'id_prodi',
            // 'nama_program_studi',
            //'id_matkul',
            'kode_mata_kuliah',
            'nama_mata_kuliah',
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
            //'nim',
            //'nama_mahasiswa',
            //'angkatan',
        ],
    ]); ?>

    <?php endif ?>

</div>
