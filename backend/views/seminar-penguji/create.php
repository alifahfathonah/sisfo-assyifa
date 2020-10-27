<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SeminarPenguji */

$this->title = 'Tambah Penguji';
$this->params['breadcrumbs'][] = ['label' => 'Seminar', 'url' => ['seminar/index']];
$this->params['breadcrumbs'][] = ['label' => $model->seminar->mahasiswa->nama.' - '.$model->seminar->judul, 'url' => ['seminar/view','id'=>$model->seminar_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seminar-penguji-create">
<div class="card shadow mb-4">
<div class="card-body">
    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
        'dosen' => $dosen,
    ]) ?>

</div>
</div>
</div>
