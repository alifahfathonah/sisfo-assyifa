<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DosenPembimbingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dosen Pembimbing - '.$searchModel->mahasiswa->nama;
$this->params['breadcrumbs'][] = ['label' => 'Skripsi', 'url' => ['skripsi/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dosen-pembimbing-index">
<div class="card shadow mb-4">
<div class="card-body">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Dosen Pembimbing', ['create','mahasiswa_id'=>$searchModel->mahasiswa_id], ['class' => 'btn btn-success']) ?>
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
