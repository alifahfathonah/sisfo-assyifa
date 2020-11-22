<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MahasiswaKrs */

$this->title = 'KRS '.$model->nama_mahasiswa;
$this->params['breadcrumbs'][] = ['label' => 'Mahasiswa Krs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mahasiswa-krs-view">
<div class="card shadow mb-4">
<div class="card-body">
    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?php if(Yii::$app->user->can('Master')): ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php endif ?>
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
