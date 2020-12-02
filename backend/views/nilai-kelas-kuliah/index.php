<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NilaiKelasKuliahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nilai Kelas Kuliah';
$this->params['breadcrumbs'][] = $this->title;
$array = Yii::$app->request->queryParams;
array_unshift($array, 'export');
?>
<div class="nilai-kelas-kuliah-index">
<div class="card shadow mb-4">
<div class="card-body">

    <p>
        <?= Html::a('Export', Url::to($array), ['class' => 'btn btn-success']) ?>
    </p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute'=>'nim',
                'value'=>'mahasiswa.nim',
            ],
            [
                'attribute'=>'mahasiswa',
                'value'=>'mahasiswa.nama_mahasiswa',
            ],
            [
                'attribute'=>'mata_kuliah',
                'value'=>'kelasKuliah.nama_mata_kuliah',
            ],
            [
                'attribute'=>'kelas',
                'value'=>'kelasKuliah.nama_kelas_kuliah',
            ],
            'nilai_angka',
            'nilai_indeks',
            'nilai_huruf',

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
</div>
</div>
</div>
