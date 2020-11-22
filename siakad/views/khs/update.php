<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MahasiswaKhs */

$this->title = 'Update Mahasiswa Khs: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mahasiswa Khs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mahasiswa-khs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
