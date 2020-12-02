<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\DosenPengajar */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dosen Pengajars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dosen-pengajar-view">

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
            'id_aktivitas_mengajar',
            'id_registrasi_dosen',
            'id_dosen',
            'nidn',
            'nama_dosen',
            'id_kelas_kuliah',
            'nama_kelas_kuliah',
            'id_subtansi',
            'sks_subtansi_total',
            'rencana_minggu_pertemuan',
            'realisasi_minggu_pertemuan',
            'id_jenis_evaluasi',
            'nama_jenis_evaluasi',
        ],
    ]) ?>

</div>
