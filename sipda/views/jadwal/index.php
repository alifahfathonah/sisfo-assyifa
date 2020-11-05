<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\JadwalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jadwal Perkuliahan';
$this->params['breadcrumbs'][] = $this->title;
$columns = [];

$columns = ['class' => 'yii\grid\ActionColumn',
'template'=>'{view}',
'buttons' => [
    'view' => function($url,$model) {
        return Html::a('<i class="fa fa-eye"></i>', Url::to(['jadwal/materi','id'=>$model->jadwal_id]), [
            'title' => Yii::t('app', 'view')
        ]);
    }
 ]
];

?>
<div class="jadwal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nama_dosen',
            'nama_mata_kuliah',
            [
                'attribute'=>'kelas',
                'value'=>function($model){
                    return $model->kelas->nama;
                }
            ],
            'hari',
            'mataKuliah.prodi.bobot_sks',
            'waktu_mulai',
            'waktu_selesai',
            //'created_at',
            $columns,
        ],
    ]); ?>

    </div>
    
    <?php if($praktekProvider->count): ?>
    <h1>Jadwal PKK</h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $praktekProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'instansi',
                'value'=>'praktek.instansi'
            ],
            [
                'attribute'=>'bulan / tahun',
                'value'=>function($model){
                    $bulan = [
                        1 => 'Januari',
                        2 => 'Februari',
                        3 => 'Maret',
                        4 => 'April',
                        5 => 'Mei',
                        6 => 'Juni',
                        7 => 'Juli',
                        8 => 'Agustus',
                        9 => 'September',
                        10 => 'Oktober',
                        11 => 'November',
                        12 => 'Desember',
                    ];
                    return $bulan[$model->praktek->bulan].' - '.$model->praktek->tahun;
                }
            ],
            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{view}',
                'buttons' => [
                    'view' => function($url,$model) {
                        return Html::a('<i class="fa fa-eye"></i>', Url::to(['jadwal/praktek','id'=>$model->praktek_id]), [
                            'title' => Yii::t('app', 'view')
                        ]);
                    }
                ]
            ]
        ],
    ]); ?>

    </div>

    <?php endif ?>

</div>
