<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NilaiKelasKuliah */

$this->title = 'Update Nilai Kelas Kuliah: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nilai Kelas Kuliahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nilai-kelas-kuliah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
