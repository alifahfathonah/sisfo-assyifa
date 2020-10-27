<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Seminar */

$this->title = $model->mahasiswa->nama.' - '.$model->judul;
$this->params['breadcrumbs'][] = ['label' => 'Seminar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="seminar-view">
<div class="card shadow mb-4">
<div class="card-body">
    <h4><?= Html::encode($this->title) ?></h4>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'judul',
            'nilai_harapan',
            'nilai_didapat',
            'tanggal',
        ],
    ]) ?>

    <p>
        <?= Html::a('Tambah Penguji', ['seminar-penguji/create','seminar_id'=>$model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'dosen.nama',
            'status',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' => function(){
                        return '';
                    },
                    'view' => function(){
                        return '';
                    },
                    'delete'=>function($url,$model){
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['seminar-penguji/delete', 'id' => $model->id], [
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>

</div>
</div>
</div>
