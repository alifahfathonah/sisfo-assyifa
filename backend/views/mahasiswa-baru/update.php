<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MahasiswaBaru */

$this->title = 'Update Mahasiswa Baru: ' . $model->nama_mahasiswa;
$this->params['breadcrumbs'][] = ['label' => 'Mahasiswa Baru', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_mahasiswa, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mahasiswa-baru-update">
<div class="card shadow mb-4">
<div class="card-body">
    <?= $this->render('_form', [
        'model' => $model,
        'prodi' => $prodi,
        'wilayah' => [],
        'agama' => $agama,
        'semester' => $semester,
        'jalur_masuk' => $jalur_masuk,
        'negara' => $negara,
    ]) ?>

</div>
</div>
</div>
