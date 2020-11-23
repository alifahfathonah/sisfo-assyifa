<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ListPenugasanDosen */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'List Penugasan Dosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="list-penugasan-dosen-view">

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
            'id_registrasi_dosen',
            'id_dosen',
            'nama_dosen',
            'nidn',
            'id_tahun_ajaran',
            'nama_tahun_ajaran',
            'id_perguruan_tinggi',
            'nama_perguruan_tinggi',
            'id_prodi',
            'nama_program_studi',
            'nomor_surat_tugas',
            'tanggal_surat_tugas',
            'mulai_surat_tugas',
        ],
    ]) ?>

</div>
