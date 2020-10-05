<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Mahasiswa */

$this->title = 'Update Mahasiswa: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mahasiswa', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mahasiswa-update">
<div class="card shadow mb-4">
<div class="card-body">
    <?= $this->render('_form', [
        'model' => $model,
        'user' => $user,
        'prodi' => $prodi,
    ]) ?>

</div>
</div>
</div>
