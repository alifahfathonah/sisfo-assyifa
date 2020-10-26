<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Kelas */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kelas-view">
<div class="card shadow mb-4">
<div class="card-body">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Mahasiswa', ['mahasiswa-kelas/index', 'MahasiswaKelasSearch[kelas_id]' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Mata Kuliah', ['dosen-pengampuh/index', 'DosenPengampuhSearch[kelas_id]' => $model->id], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute'=>'tahun akademik',
                'value' => function($model)
                {
                    return $model->tahunAkademik->tahun.$model->tahunAkademik->periode;
                }
            ],
            [
                'attribute'=>'program studi',
                'value' => function($model)
                {
                    return $model->prodi->jenjang.' '.$model->prodi->nama;
                }
            ],
            'kode',
            'nama',
            'semester',
            'created_at',
        ],
    ]) ?>

</div>
</div>
</div>
