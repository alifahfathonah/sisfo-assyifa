<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DosenPembimbing */

$this->title = 'Tambah Dosen Pembimbing';
$this->params['breadcrumbs'][] = ['label' => 'Dosen Pembimbing', 'url' => ['index','DosenPembimbingSearch[mahasiswa_id]'=>$model->mahasiswa_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dosen-pembimbing-create">
<div class="card shadow mb-4">
<div class="card-body">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dosen' => $dosen,
    ]) ?>

</div>
</div>
</div>
