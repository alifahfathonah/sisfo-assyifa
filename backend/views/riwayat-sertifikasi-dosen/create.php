<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RiwayatSertifikasiDosen */

$this->title = 'Create Riwayat Sertifikasi Dosen';
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Sertifikasi Dosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="riwayat-sertifikasi-dosen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
