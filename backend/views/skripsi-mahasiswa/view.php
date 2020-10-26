<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\SkripsiMahasiswa */

$this->title = "Skripsi ".$model->mahasiswa->nama;
$this->params['breadcrumbs'][] = ['label' => 'Skripsi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Skripsi '.$model->skripsi->tahunAkademik->tahun.' '.$model->skripsi->tahunAkademik->periode, 'url' => ['skripsi/view','id'=>$model->skripsi_id]];
$this->params['breadcrumbs'][] = ['label' => 'Skripsi Mahasiswa', 'url' => ['index','SkripsiMahasiswaSearch[skripsi_id]'=>$model->skripsi_id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="skripsi-mahasiswa-view">
<div class="card shadow mb-4">
<div class="card-body">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Tambah Dosen Pembimbing', ['dosen-pembimbing/create','mahasiswa_id'=>$model->mahasiswa_id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'dosen',
                'value' => 'dosen.nama'
            ],
            'status',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' => function($url){
                        return '';
                    },
                    'view' => function($url){
                        return '';
                    }
                ]
            ],
        ],
    ]); ?>

</div>
</div>
</div>
