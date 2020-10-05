<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Installation */

$this->title = 'Update Installation: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Installations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="installation-update">
<div class="card shadow mb-4">
<div class="card-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
