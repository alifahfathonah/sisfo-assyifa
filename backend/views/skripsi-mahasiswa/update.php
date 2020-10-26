<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SkripsiMahasiswa */

$this->title = 'Update Skripsi Mahasiswa: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Skripsi Mahasiswas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="skripsi-mahasiswa-update">
<div class="card shadow mb-4">
<div class="card-body">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
