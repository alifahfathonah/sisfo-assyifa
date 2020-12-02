<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\KartuUjianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kartu Ujian';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kartu-ujian-index">
<div class="card shadow mb-4">
<div class="card-body">
    <p>
        <?= Html::a('Buat Kartu Ujian', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'id_semester',
            [
                'attribute'=>'nim',
                'value'=>'mahasiswa.nim'
            ],
            [
                'attribute'=>'mahasiswa',
                'value'=>'mahasiswa.nama_mahasiswa'
            ],
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
</div>
</div>
