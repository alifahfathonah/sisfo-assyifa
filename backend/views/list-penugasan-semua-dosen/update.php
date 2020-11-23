<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ListPenugasanSemuaDosen */

$this->title = 'Update List Penugasan Semua Dosen: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'List Penugasan Semua Dosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="list-penugasan-semua-dosen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
