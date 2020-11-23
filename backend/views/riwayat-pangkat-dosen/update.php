<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RiwayatPangkatDosen */

$this->title = 'Update Riwayat Pangkat Dosen: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Pangkat Dosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="riwayat-pangkat-dosen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
