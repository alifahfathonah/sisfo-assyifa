<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Jadwal */

$this->title = 'Update Jadwal: ' . $model->dosenPengampuh->dosen->nama.' - '.$model->dosenPengampuh->mataKuliah->nama;
$this->params['breadcrumbs'][] = ['label' => 'Jadwal', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dosenPengampuh->dosen->nama.' - '.$model->dosenPengampuh->mataKuliah->nama, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jadwal-update">
<div class="card shadow mb-4">
<div class="card-body">
    <?= $this->render('_form', [
        'model' => $model,
        'dosen_mata_kuliah' => $dosen_mata_kuliah,
    ]) ?>

</div>
</div>
</div>
