<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\JadwalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jadwal';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwal-index">
<div class="card shadow mb-4">
<div class="card-body">
    <p>
        <?= Html::a('Create Jadwal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php if(Yii::$app->session->hasFlash('success')):?>
        <div class="alert alert-success">
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif; ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'dosen',
                'value'=>function($model){
                    return $model->dosenPengampuh->dosen->nama;
                }
            ],
            [
                'attribute'=>'mata_kuliah',
                'value'=>function($model){
                    return $model->dosenPengampuh->mataKuliah->nama;
                }
            ],
            [
                'attribute'=>'kelas',
                'value'=>function($model){
                    return $model->dosenPengampuh->kelas->nama;
                }
            ],
            'hari',
            'waktu_mulai',
            'waktu_selesai',
            //'created_at',

            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' =>  function($url,$model) {
                        return Html::a('<i class="fa fa-pencil-alt"></i>', $url, [
                            'title' => Yii::t('app', 'update')
                        ]);
                    },
                    'view' =>  function($url,$model) {
                        return Html::a('<i class="fa fa-eye"></i>', $url, [
                            'title' => Yii::t('app', 'view')
                        ]);
                    },
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
