<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Jadwal */

$this->title = 'Create Jadwal';
$this->params['breadcrumbs'][] = ['label' => 'Jadwal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwal-create">
<div class="card shadow mb-4">
<div class="card-body">
    <?= $this->render('_form', [
        'model' => $model,
        'dosen_mata_kuliah' => $dosen_mata_kuliah,
    ]) ?>

</div>
</div>
</div>
