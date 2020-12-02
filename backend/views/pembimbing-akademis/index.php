<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PembimbingAkademisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pembimbing Akademis';
$this->params['breadcrumbs'][] = ['label' => 'Dosen', 'url' => ['dosen/index']];
$this->params['breadcrumbs'][] = ['label' => $searchModel->dosen->nama, 'url' => ['dosen/view','id'=>$searchModel->dosen_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembimbing-akademis-index">
<div class="card shadow mb-4">
<div class="card-body">

    <p>
        <?= Html::a('Tambah', ['create','dosen_id'=>$searchModel->dosen_id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'mahasiswa',
                'value'=>'mahasiswa.nama'
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function(){
                        return '';
                    },
                    'update' => function(){
                        return '';
                    }
                ]
            ],
        ],
    ]); ?>


</div>
</div>
</div>
