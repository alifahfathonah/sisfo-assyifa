<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MahasiswaKrs */

$this->title = 'Update Mahasiswa Krs: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mahasiswa Krs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mahasiswa-krs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
