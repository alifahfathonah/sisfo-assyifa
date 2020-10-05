<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TahunAkademik */

$this->title = 'Update Tahun Akademik: ' . $model->tahun.$model->periode;
$this->params['breadcrumbs'][] = ['label' => 'Tahun Akademik', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tahun.$model->periode, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tahun-akademik-update">
<div class="card shadow mb-4">
<div class="card-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
