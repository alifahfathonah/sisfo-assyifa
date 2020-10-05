<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Materi */

$this->title = 'Create Materi';
$this->params['breadcrumbs'][] = ['label' => 'Materi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materi-create">
<div class="card shadow mb-4">
<div class="card-body">
    <?= $this->render('_form', [
        'model' => $model,
        'dosen_mata_kuliah' => $dosen_mata_kuliah,
    ]) ?>

</div>
</div>
</div>
