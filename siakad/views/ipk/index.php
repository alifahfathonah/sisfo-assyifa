<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MahasiswaIpkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Index Prestasi Komulatif';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mahasiswa-ipk-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'showFooter'=>TRUE,
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'id_registrasi_mahasiswa',
            // 'id_mahasiswa',
            // 'id_semester',
            'nama_semester',
            //'nim',
            //'nama_mahasiswa',
            //'angkatan',
            //'id_prodi',
            'nama_program_studi',
            //'id_status_mahasiswa',
            //'nama_status_mahasiswa',
            [
                'attribute'=>'ips',
                'value'=>'ips',
                'footer' => "IPK : <b>".$ipk."</b>"
            ],
            [
                'attribute'=>'sks_semester',
                'value'=>'sks_semester',
                'footer' => "Total SKS : <b>".$sks."</b>"
            ],
            //'ipk',
            // 'sks_semester',
            //'sks_total',
            //'biaya_kuliah_smt',

            // ['class' => 'yii\grid\ActionColumn'],

        ],
    ]); ?>


</div>
