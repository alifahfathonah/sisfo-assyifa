<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PraktekMahasiswa */

$this->title = 'Tambah Mahasiswa';
$this->params['breadcrumbs'][] = ['label' => 'Jadwal PKK', 'url' => ['praktek/index']];
$this->params['breadcrumbs'][] = ['label' => $model->praktek->tahunAkademik->tahun.' '.$model->praktek->tahunAkademik->periode, 'url' => ['praktek/view','id'=>$model->praktek_id]];
$this->params['breadcrumbs'][] = ['label' => 'Mahasiswa PKK', 'url' => ['index','PraktekMahasiswaSearch[praktek_id]'=>$model->praktek_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="praktek-mahasiswa-create">
<div class="card shadow mb-4">
<div class="card-body">
    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
        'angkatan' => $angkatan,
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]) ?>

</div>
</div>
</div>
