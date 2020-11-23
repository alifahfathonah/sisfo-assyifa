<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RiwayatPendidikanDosen */

$this->title = 'Update Riwayat Pendidikan Dosen: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Pendidikan Dosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="riwayat-pendidikan-dosen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
