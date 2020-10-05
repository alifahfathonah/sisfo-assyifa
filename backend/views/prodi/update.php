<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Prodi */

$this->title = 'Update Program Studi: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Program Studi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prodi-update">
<div class="card shadow mb-4">
<div class="card-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
