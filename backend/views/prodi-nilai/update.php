<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProdiNilai */

$this->title = 'Update Prodi Nilai: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Prodi Nilais', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prodi-nilai-update">
<div class="card shadow mb-4">
<div class="card-body">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
