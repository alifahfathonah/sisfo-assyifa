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
            'waktu_mulai',
            'waktu_selesai',
            //'created_at',
            $columns,
        ],
    ]); ?>


</div>
