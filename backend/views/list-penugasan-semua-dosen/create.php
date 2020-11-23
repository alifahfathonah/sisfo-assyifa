<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ListPenugasanSemuaDosen */

$this->title = 'Create List Penugasan Semua Dosen';
$this->params['breadcrumbs'][] = ['label' => 'List Penugasan Semua Dosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="list-penugasan-semua-dosen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
