<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ListPenugasanDosen */

$this->title = 'Create List Penugasan Dosen';
$this->params['breadcrumbs'][] = ['label' => 'List Penugasan Dosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="list-penugasan-dosen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
