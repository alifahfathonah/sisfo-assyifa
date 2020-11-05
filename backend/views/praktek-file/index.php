<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PraktekFileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Praktek Files';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="praktek-file-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Praktek File', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'praktek_id',
            'mahasiswa_id',
            'dosen_id',
            'file_url:url',
            //'file_koreksi_url:url',
            //'keterangan:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
