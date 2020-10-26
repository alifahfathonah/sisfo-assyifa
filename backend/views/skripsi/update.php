<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Skripsi */

$this->title = 'Edit Skripsi: ' . $model->tahunAkademik->tahun.' '.$model->tahunAkademik->periode;
$this->params['breadcrumbs'][] = ['label' => 'Skripsis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="skripsi-update">
<div class="card shadow mb-4">
<div class="card-body">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'tahunAkademik' => $tahunAkademik,
    ]) ?>

</div>
</div>
</div>
