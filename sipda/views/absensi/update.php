<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Absensi */

$this->title = 'Update Absensi: ' . $model->jadwal->hari.' - '.$model->jadwal->dosenPengampuh->mataKuliah->nama.' - '.$model->jadwal->dosenPengampuh->kelas->nama;
$this->params['breadcrumbs'][] = ['label' => 'Absensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jadwal->hari.' - '.$model->jadwal->dosenPengampuh->mataKuliah->nama.' - '.$model->jadwal->dosenPengampuh->kelas->nama, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="absensi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'jadwal' => $jadwal,
    ]) ?>

</div>
