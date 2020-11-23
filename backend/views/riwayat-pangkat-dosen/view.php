<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\RiwayatPangkatDosen */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Pangkat Dosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="riwayat-pangkat-dosen-view">

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
            'id_pangkat_golongan',
            'nama_pangkat_golongan',
            'sk_pangkat',
            'tanggal_sk_pangkat',
            'mulai_sk_pangkat',
            'masa_kerja_dalam_tahun',
            'masa_kerja_dalam_bulan',
        ],
    ]) ?>

</div>
