<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MahasiswaKelasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mahasiswa Kelas '.$searchModel->kelas->nama.' ('.$searchModel->kelas->tahunAkademik->tahun.$searchModel->kelas->tahunAkademik->periode.')';
$this->params['breadcrumbs'][] = ['label' => 'Kelas', 'url' => ['kelas/index']];
$this->params['breadcrumbs'][] = ['label' => $searchModel->kelas->nama, 'url' => ['kelas/view', 'id' => $searchModel->kelas_id]];
$this->params['breadcrumbs'][] = "Mahasiswa";
?>
<div class="mahasiswa-kelas-index">
<div class="card shadow mb-4">
<div class="card-body">
    <p>
        <?= Html::a('Tambah Mahasiswa', ['create','kelas_id'=>$searchModel->kelas_id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'kelas_id',
            [
                'attribute'=>'mahasiswa',
                'value'=>'mahasiswa.nama',
            ],

            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'delete' => function($url,$model) {
                        return Html::a('<i class="fa fa-trash"></i>', $url, [
                            'title' => Yii::t('app', 'delete')
                        ]);
                    }
                 ]
            ],
        ],
    ]); ?>


</div>
</div>
</div>
