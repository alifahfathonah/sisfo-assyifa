<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PembimbingAkademis */

$this->title = 'Update Pembimbing Akademis: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pembimbing Akademis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pembimbing-akademis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
