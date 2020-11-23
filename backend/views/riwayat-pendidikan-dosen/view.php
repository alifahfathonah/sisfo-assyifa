<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\RiwayatPendidikanDosen */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Pendidikan Dosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="riwayat-pendidikan-dosen-view">

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
            'id_bidang_studi',
            'nama_bidang_studi',
            'id_jenjang_pendidikan',
            'nama_jenjang_pendidikan',
            'id_gelar_akademik',
            'nama_gelar_akademik',
            'id_perguruan_tinggi',
            'nama_perguruan_tinggi',
            'fakultas',
            'tahun_lulus',
            'sks_lulus',
            'ipk',
        ],
    ]) ?>

</div>
