<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RiwayatFungsionalDosenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Riwayat Fungsional Dosens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="riwayat-fungsional-dosen-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Riwayat Fungsional Dosen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_dosen',
            'nidn',
            'nama_dosen',
            'id_jabatan_fungsional',
            //'nama_jabatan_fungsional',
            //'sk_jabatan_fungsional',
            //'mulai_sk_jabatan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
