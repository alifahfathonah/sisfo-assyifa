<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Absensi */

$this->title = $model->jadwal->hari.' - '.$model->jadwal->dosenPengampuh->mataKuliah->nama.' - '.$model->jadwal->dosenPengampuh->kelas->nama;
$this->params['breadcrumbs'][] = ['label' => 'Absensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="absensi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if(in_array($model->jadwal_id, $jadwal)): ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?php endif ?>
        <?= Html::a('Mahasiswa', ['absensi-mahasiswa/index', 'absensi_id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute'=>'Jadwal',
                'value' => function($model){
                    return $model->jadwal->hari.' - '.$model->jadwal->dosenPengampuh->mataKuliah->nama.' - '.$model->jadwal->dosenPengampuh->kelas->nama;
                }
            ],
            'pertemuan',
            'tanggal',
        ],
    ]) ?>

</div>
