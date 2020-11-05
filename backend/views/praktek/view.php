<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Praktek */

$this->title = $model->tahunAkademik->tahun.' '.$model->tahunAkademik->periode;
$this->params['breadcrumbs'][] = ['label' => 'Jadwal PKK', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="praktek-view">
<div class="card shadow mb-4">
<div class="card-body">
    <h4><?= Html::encode($this->title) ?></h4>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Mahasiswa', ['praktek-mahasiswa/index', 'PraktekMahasiswaSearch[praktek_id]' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Dosen', ['praktek-dosen/index', 'PraktekDosenSearch[praktek_id]' => $model->id], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'Tahun Akademik',
                'value' => function($model){
                    return $model->tahunAkademik->tahun.' '.$model->tahunAkademik->periode;
                }
            ],
            'instansi',
            'bulan',
            'tahun',
        ],
    ]) ?>

</div>
</div>
</div>
