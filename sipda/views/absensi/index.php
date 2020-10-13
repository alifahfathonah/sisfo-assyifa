<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AbsensiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Absensi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="absensi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Buat Absensi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php if(Yii::$app->session->hasFlash('success')):?>
        <div class="alert alert-success">
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif; ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'jadwal',
                'value'=>function($model){
                    return $model->jadwal->hari.' - '.$model->jadwal->dosenPengampuh->mataKuliah->nama.' - '.$model->jadwal->dosenPengampuh->kelas->nama;
                }
            ],
            'pertemuan',
            'tanggal',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
