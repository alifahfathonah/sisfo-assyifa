<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Dosen */

$this->title = 'Update Dosen: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Dosen', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dosen-update">
<div class="card shadow mb-4">
<div class="card-body">
    <?= $this->render('_form', [
        'model' => $model,
        'user' => $user,
    ]) ?>

</div>
</div>
</div>
