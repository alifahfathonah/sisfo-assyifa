<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MataKuliah */

$this->title = 'Create Mata Kuliah';
$this->params['breadcrumbs'][] = ['label' => 'Mata Kuliah', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mata-kuliah-create">
<div class="card shadow mb-4">
<div class="card-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
