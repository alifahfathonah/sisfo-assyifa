<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PengajuanSkripsiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengajuan Skripsi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengajuan-skripsi-index">
<div class="card shadow mb-4">
<div class="card-body">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php /*
    <p>
        <?= Html::a('Create Pengajuan Skripsi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    */ ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'nim',
                'value' => 'mahasiswa.NIM'
            ],
            [
                'attribute' => 'mahasiswa',
                'value' => 'mahasiswa.nama'
            ],
            'judul',
            'status',
            [
                'attribute'=>'file_url',
                'format' => 'raw',
                'value'=>function($model){
                    return Html::a('Download',Yii::$app->params['frontend_url'].'/uploads/'.$model->file_url,['target'=>'_blank']);
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' => function(){
                        return '';
                    },
                    'delete' => function(){
                        return '';
                    },
                ]
            ],
        ],
    ]); ?>


</div>
