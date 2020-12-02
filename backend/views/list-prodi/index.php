<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ListProdiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List Prodis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="list-prodi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create List Prodi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_prodi',
            'kode_program_studi',
            'nama_program_studi',
            'status',
            //'id_jenjang_pendidikan',
            //'nama_jenjang_pendidikan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
