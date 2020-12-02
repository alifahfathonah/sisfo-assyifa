<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PembimbingAkademis */

$this->title = 'Tambah Pembimbing Akademis';
$this->params['breadcrumbs'][] = ['label' => 'Dosen', 'url' => ['dosen/index']];
$this->params['breadcrumbs'][] = ['label' => $model->dosen->nama, 'url' => ['dosen/view', 'id'=>$model->dosen_id]];
$this->params['breadcrumbs'][] = ['label' => 'Pembimbing Akademis', 'url' => ['index','PembimbingAkademisSearch[dosen_id]'=>$model->dosen_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembimbing-akademis-create">
<div class="card shadow mb-4">
<div class="card-body">

    <?= $this->render('_form', [
        'model' => $model,
        'list_mahasiswa' => $list_mahasiswa,
    ]) ?>

</div>
</div>
</div>
