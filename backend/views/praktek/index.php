<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PraktekSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jadwal PKK';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="praktek-index">
<div class="card shadow mb-4">
<div class="card-body">
    <h4><?= Html::encode($this->title) ?></h4>

    <p>
        <?= Html::a('Buat Jadwal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'tahun_akademik',
                'value'=>function($model){
                    return $model->tahunAkademik->tahun.' '.$model->tahunAkademik->periode;
                }
            ],
            'instansi',
            'bulan',
            'tahun',
            //'tanggal',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
</div>
</div>
