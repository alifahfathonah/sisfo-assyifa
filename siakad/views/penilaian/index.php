<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\JadwalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penilaian';
$this->params['breadcrumbs'][] = $this->title;
$columns = [];

$columns = ['class' => 'yii\grid\ActionColumn',
'template'=>'{view}',
'buttons' => [
    'view' => function($url,$model) {
        return Html::a('<i class="fa fa-eye"></i>', Url::to(['detail','id'=>$model->id_kelas_kuliah]), [
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
            'kode_mata_kuliah',
            'nama_mata_kuliah',
            'sks',
            'nama_kelas_kuliah',
            // [
            //     'attribute'=>'kelas',
            //     'value'=>function($model){
            //         return $model->kelas->nama;
            //     }
            // ],
            // 'mataKuliah.prodi.bobot_sks',
            //'created_at',
            $columns,
        ],
    ]); ?>

    </div>

</div>
