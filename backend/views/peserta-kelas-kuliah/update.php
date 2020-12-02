<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PesertaKelasKuliah */

$this->title = 'Update Peserta Kelas Kuliah: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Peserta Kelas Kuliahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="peserta-kelas-kuliah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
