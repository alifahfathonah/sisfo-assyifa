<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MahasiswaKelas */

$this->title = 'Update Mahasiswa Kelas: ' . $model->kelas->nama;
$this->params['breadcrumbs'][] = ['label' => 'Kelas', 'url' => ['kelas/index']];
$this->params['breadcrumbs'][] = ['label' => $model->kelas->nama, 'url' => ['index', 'MahasiswaKelasSearch[kelas_id]' => $model->kelas_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mahasiswa-kelas-update">
<div class="card shadow mb-4">
<div class="card-body">
    <?= $this->render('_form', [
        'model' => $model,
        'mahasiswa' => $mahasiswa,
    ]) ?>

</div>
</div>
</div>
