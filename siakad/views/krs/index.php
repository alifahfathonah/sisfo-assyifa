<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MahasiswaKrsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kartu Rencana Studi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mahasiswa-krs-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="search-form">
        <form action="">
            <div class="form-group">
                <label for="">Periode</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="MahasiswaKrsSearch[id_periode]" placeholder="Contoh : 20151" value="<?=$searchModel->id_periode?>">
                    <div class="input-group-btn">
                        <button class="btn btn-primary">Go</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'id_registrasi_mahasiswa',
            // 'id_periode',
            // 'id_prodi',
            'nama_program_studi',
            //'id_matkul',
            'kode_mata_kuliah',
            'nama_mata_kuliah',
            //'id_kelas',
            // 'nama_kelas_kuliah',
            'sks_mata_kuliah',
            //'nim',
            //'nama_mahasiswa',
            //'angkatan',
        ],
    ]); ?>


</div>
