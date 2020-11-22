<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MahasiswaKrsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manajemen KRS';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mahasiswa-krs-index">
<div class="card shadow mb-4">
<div class="card-body">
    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Import KRS', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Hapus Semua', ['delete-all'], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete all items?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <div class="table-responsive">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_periode',
            'nama_mahasiswa',
            'angkatan',
            'nama_program_studi',
            'nama_mata_kuliah',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
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
</div>
