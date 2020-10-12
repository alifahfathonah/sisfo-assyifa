<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DosenPengampuhSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mata Kuliah Kelas '.$searchModel->kelas->nama;
$this->params['breadcrumbs'][] = ['label' => 'Kelas', 'url' => ['kelas/index']];
$this->params['breadcrumbs'][] = ['label' => $searchModel->kelas->nama, 'url' => ['kelas/view', 'id' => $searchModel->kelas_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dosen-pengampuh-index">
<div class="card shadow mb-4">
<div class="card-body">
    <p>
        <?= Html::a('Tambah Mata Kuliah', ['create','kelas_id'=>$searchModel->kelas_id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'dosen',
                'value'=>'dosen.nama'
            ],
            [
                'attribute'=>'mata_kuliah',
                'value'=>function($model){
                    return $model->mataKuliah->nama;
                }
            ],

            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' =>  function($url,$model) {
                        return Html::a('<i class="fa fa-pencil-alt"></i>', $url.'&kelas_id='.$model->kelas_id, [
                            'title' => Yii::t('app', 'update')
                        ]);
                    },
                    'delete' => function($url,$model) {
                        return Html::a('<i class="fa fa-trash"></i>', $url, [
                            'title' => Yii::t('app', 'delete'),
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ]
                        ]);
                    }
                 ]
            ],
        ],
    ]); ?>


</div>
</div>
</div>
