<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MahasiswaKrs */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mahasiswa Krs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mahasiswa-krs-view">

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
            'id_registrasi_mahasiswa',
            'id_periode',
            'id_prodi',
            'nama_program_studi',
            'id_matkul',
            'kode_mata_kuliah',
            'nama_mata_kuliah',
            'id_kelas',
            'nama_kelas_kuliah',
            'sks_mata_kuliah',
            'nim',
            'nama_mahasiswa',
            'angkatan',
        ],
    ]) ?>

</div>
