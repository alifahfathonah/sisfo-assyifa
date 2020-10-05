<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Application */

$this->title = 'Update Application: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Application', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="application-update">
<div class="card shadow mb-4">
<div class="card-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
