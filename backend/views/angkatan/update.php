<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Angkatan */

$this->title = 'Update Angkatan: ' . $model->tahun;
$this->params['breadcrumbs'][] = ['label' => 'Angkatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tahun, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="angkatan-update">
<div class="card shadow mb-4">
<div class="card-body">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
