<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PraktekDosenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dosen Pengampuh PKK';
$this->params['breadcrumbs'][] = ['label' => 'Jadwal PKK', 'url' => ['praktek/index']];
$this->params['breadcrumbs'][] = ['label' => $searchModel->praktek->tahunAkademik->tahun.' '.$searchModel->praktek->tahunAkademik->periode, 'url' => ['praktek/view','id'=>$searchModel->praktek_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="praktek-dosen-index">
<div class="card shadow mb-4">
<div class="card-body">
    <h4><?= Html::encode($this->title) ?></h4>

    <p>
        <?= Html::a('Tambah Dosen Pengampuh', ['create','praktek_id'=>$searchModel->praktek_id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'NIDN',
                'value'=>function($model){
                    return $model->dosen->NIDN;
                }
            ],
            [
                'attribute'=>'dosen',
                'value'=>function($model){
                    return $model->dosen->nama;
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons'=>[
                    'view' => function(){
                        return '';
                    },
                    'update' => function(){
                        return '';
                    },
                ]
            ],
        ],
    ]); ?>


</div>
</div>
</div>
