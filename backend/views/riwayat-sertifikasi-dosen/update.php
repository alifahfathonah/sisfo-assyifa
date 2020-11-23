<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RiwayatSertifikasiDosen */

$this->title = 'Update Riwayat Sertifikasi Dosen: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Sertifikasi Dosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="riwayat-sertifikasi-dosen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
