<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SkripsiMahasiswaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Skripsi Mahasiswa '.$searchModel->skripsi->tahunAkademik->tahun.' '.$searchModel->skripsi->tahunAkademik->periode;
$this->params['breadcrumbs'][] = ['label' => 'Skripsi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Skripsi '.$searchModel->skripsi->tahunAkademik->tahun.' '.$searchModel->skripsi->tahunAkademik->periode, 'url' => ['skripsi/view','id'=>$searchModel->skripsi_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skripsi-mahasiswa-index">
<div class="card shadow mb-4">
<div class="card-body">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Mahasiswa', ['create','skripsi_id'=>$searchModel->skripsi_id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'nim',
                'value' => function($model){
                    return $model->mahasiswa->NIM;
                }
            ],
            [
                'attribute' => 'mahasiswa',
                'value' => function($model){
                    return $model->mahasiswa->nama;
                }
            ],
            [
                'attribute' => 'dosen_pembimbing',
                'format'=>'raw',
                'value' => function($model){
                    $dosen_pembimbing = ArrayHelper::map($model->mahasiswa->dosenPembimbings,'id',function($m){
                        return $m->dosen->nama.' ('.$m->status.')';
                    });
                    $dosen_pembimbing = implode('<br>',$dosen_pembimbing) == "" ? "-" : implode('<br>',$dosen_pembimbing);
                    return $dosen_pembimbing;
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' => function($url){
                        return '';
                    }
                ]
            ],
        ],
    ]); ?>


</div>
</div>
</div>
