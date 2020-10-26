<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Skripsi */

$this->title = "Skripsi ".$model->tahunAkademik->tahun.' '.$model->tahunAkademik->periode;
$this->params['breadcrumbs'][] = ['label' => 'Skripsi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="skripsi-view">
<div class="card shadow mb-4">
<div class="card-body">
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
        <?= Html::a('Mahasiswa', ['skripsi-mahasiswa/index', 'SkripsiMahasiswaSearch[skripsi_id]' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'Tahun Akademik',
                'value' => function($model)
                {
                    return $model->tahunAkademik->tahun.' '.$model->tahunAkademik->periode;
                }
            ],
        ],
    ]) ?>

</div>
</div>
</div>
