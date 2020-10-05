<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MahasiswaKelas */

$this->title = 'Tambah Mahasiswa Kelas '.$model->kelas->nama;
$this->params['breadcrumbs'][] = ['label' => 'Mahasiswa Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mahasiswa-kelas-create">
<div class="card shadow mb-4">
<div class="card-body">
    <?= $this->render('_form', [
        'model' => $model,
        'mahasiswa' => $mahasiswa,
    ]) ?>

</div>
</div>
</div>
