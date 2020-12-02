<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StrukturOrganisasi */

$this->title = 'Tambah Struktur Organisasi';
$this->params['breadcrumbs'][] = ['label' => 'Struktur Organisasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="struktur-organisasi-create">
<div class="card shadow mb-4">
<div class="card-body">

    <?= $this->render('_form', [
        'model' => $model,
        'dosen' => $dosen,
    ]) ?>

</div>
</div>
</div>
