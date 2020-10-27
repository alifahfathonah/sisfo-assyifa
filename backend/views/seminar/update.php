<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Seminar */

$this->title = 'Update Seminar: ' . $model->mahasiswa->nama.' - '.$model->judul;
$this->params['breadcrumbs'][] = ['label' => 'Seminars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mahasiswa->nama.' - '.$model->judul, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="seminar-update">
<div class="card shadow mb-4">
<div class="card-body">
    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
