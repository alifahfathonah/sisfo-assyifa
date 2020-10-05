<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DosenPengampuh */

$this->title = 'Tambah Mata Kuliah Kelas '.$model->kelas->nama;
$this->params['breadcrumbs'][] = ['label' => 'Kelas', 'url' => ['kelas/index']];
$this->params['breadcrumbs'][] = ['label' => $model->kelas->nama, 'url' => ['kelas/view', 'id' => $model->kelas_id]];
$this->params['breadcrumbs'][] = ['label' => 'Mata Kuliah', 'url' => ['dosen-pengampuh/index', 'DosenPengampuhSearch[kelas_id]' => $model->kelas_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dosen-pengampuh-create">
<div class="card shadow mb-4">
<div class="card-body">
    <?= $this->render('_form', [
        'model' => $model,
        'dosen' => $dosen,
        'mata_kuliah' => $mata_kuliah,
    ]) ?>

</div>
</div>
</div>
