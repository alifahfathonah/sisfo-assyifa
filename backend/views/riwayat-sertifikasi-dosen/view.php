<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\RiwayatSertifikasiDosen */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Sertifikasi Dosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="riwayat-sertifikasi-dosen-view">

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
            'id_dosen',
            'nidn',
            'nama_dosen',
            'nomor_peserta',
            'id_bidang_studi',
            'nama_bidang_studi',
            'id_jenis_sertifikasi',
            'nama_jenis_sertifikasi',
            'tahun_sertifikasi',
            'sk_sertifikasi',
        ],
    ]) ?>

</div>
