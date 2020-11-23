<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\RiwayatPenelitianDosen */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Penelitian Dosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="riwayat-penelitian-dosen-view">

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
            'id_penelitian',
            'judul_penelitian',
            'id_kelompok_bidang',
            'kode_kelompok_bidang',
            'nama_kelompok_bidang',
            'id_lembaga_iptek',
            'nama_lembaga_iptek',
            'tahun_kegiatan',
        ],
    ]) ?>

</div>
