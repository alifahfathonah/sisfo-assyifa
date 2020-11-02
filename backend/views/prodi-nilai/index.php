<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProdiNilaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nilai Prodi - '.$searchModel->prodi->nama;
$this->params['breadcrumbs'][] = ['label' => 'Program Studi', 'url' => ['prodi/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prodi-nilai-index">
<div class="card shadow mb-4">
<div class="card-body">
    <h4><?= Html::encode($this->title) ?></h4>

    <p>
        <?= Html::a('Buat Nilai', ['create','prodi_id'=>$searchModel->prodi_id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nilai_huruf',
            'nilai_index',
            'bobot_min',
            'bobot_max',
            'tanggal_mulai',
            'tanggal_akhir',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
</div>
</div>
