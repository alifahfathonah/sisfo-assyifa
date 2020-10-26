<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Mahasiswa */

$this->title = 'Create Mahasiswa';
$this->params['breadcrumbs'][] = ['label' => 'Mahasiswa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mahasiswa-create">
<div class="card shadow mb-4">
<div class="card-body">
    <?= $this->render('_form', [
        'model' => $model,
        'user' => $user,
        'prodi' => $prodi,
        'angkatan' => $angkatan,
        'model_angkatan' => $model_angkatan,
    ]) ?>

</div>
</div>
</div>
