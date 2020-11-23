<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ListDosenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List Dosens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="list-dosen-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create List Dosen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_dosen',
            'nama_dosen',
            'nidn',
            'nip',
            //'jenis_kelamin',
            //'id_agama',
            //'nama_agama',
            //'tanggal_lahir',
            //'id_status_aktif',
            //'nama_status_aktif',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
