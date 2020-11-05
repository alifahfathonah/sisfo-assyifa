<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PraktekFile */

$this->title = 'Update Praktek File: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Praktek Files', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="praktek-file-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
