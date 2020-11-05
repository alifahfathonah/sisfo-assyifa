<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PraktekMahasiswa */

$this->title = 'Update Praktek Mahasiswa: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Praktek Mahasiswas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="praktek-mahasiswa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
