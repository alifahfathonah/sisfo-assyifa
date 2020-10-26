<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SkripsiMahasiswa */

$this->title = 'Tambah Mahasiswa';
$this->params['breadcrumbs'][] = ['label' => 'Skripsi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Skripsi '.$model->skripsi->tahunAkademik->tahun.' '.$model->skripsi->tahunAkademik->periode, 'url' => ['skripsi/view','id'=>$model->skripsi_id]];
$this->params['breadcrumbs'][] = ['label' => 'Skripsi Mahasiswa', 'url' => ['index','SkripsiMahasiswaSearch[skripsi_id]'=>$model->skripsi_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skripsi-mahasiswa-create">
<div class="card shadow mb-4">
<div class="card-body">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'angkatan' => $angkatan,
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]) ?>

</div>
</div>
</div>
