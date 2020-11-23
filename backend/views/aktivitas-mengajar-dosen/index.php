<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AktivitasMengajarDosenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aktivitas Mengajar Dosens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aktivitas-mengajar-dosen-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Aktivitas Mengajar Dosen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_registrasi_dosen',
            'id_dosen',
            'nama_dosen',
            'id_periode',
            //'nama_periode',
            //'id_prodi',
            //'nama_program_studi',
            //'id_matkul',
            //'nama_mata_kuliah',
            //'id_kelas',
            //'nama_kelas_kuliah',
            //'rencana_minggu_pertemuan',
            //'realisasi_minggu_pertemuan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
