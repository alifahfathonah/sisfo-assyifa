<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PesertaKelasKuliah */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Peserta Kelas Kuliahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="peserta-kelas-kuliah-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_kelas_kuliah',
            'id_registrasi_mahasiswa',
            'id_mahasiswa',
            'nim',
            'nama_mahasiswa',
            'id_matkul',
            'kode_mata_kuliah',
            'nama_mata_kuliah',
            'id_prodi',
            'nama_program_studi',
            'angkatan',
        ],
    ]) ?>

</div>
