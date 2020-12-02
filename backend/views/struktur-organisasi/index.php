<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StrukturOrganisasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Struktur Organisasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="struktur-organisasi-index">
<div class="card shadow mb-4">
<div class="card-body">

    <p>
        <?= Html::a('Tambah Struktur Organisasi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'dosen.nama',
            'jabatan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
</div>
</div>
