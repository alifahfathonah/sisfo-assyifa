<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Materi */

$this->title = 'Update Materi | '.$model->dosenPengampuh->mataKuliah->nama.' '.$model->dosenPengampuh->kelas->nama;
$this->params['breadcrumbs'][] = ['label' => 'Jadwal', 'url' => ['jadwal/index']];
$this->params['breadcrumbs'][] = ['label' => 'Materi - '.$model->dosenPengampuh->mataKuliah->nama.' '.$model->dosenPengampuh->kelas->nama, 'url' => ['jadwal/materi','id'=>$jadwal_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
