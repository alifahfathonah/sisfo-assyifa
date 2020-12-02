<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StrukturOrganisasi */

$this->title = 'Update Struktur Organisasi: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Struktur Organisasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jabatan, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="struktur-organisasi-update">
<div class="card shadow mb-4">
<div class="card-body">
    <?= $this->render('_form', [
        'model' => $model,
        'dosen' => $dosen,
    ]) ?>

</div>
</div>
</div>
