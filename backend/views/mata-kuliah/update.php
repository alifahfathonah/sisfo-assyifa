<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MataKuliah */

$this->title = 'Update Mata Kuliah: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mata Kuliah', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mata-kuliah-update">
<div class="card shadow mb-4">
<div class="card-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
