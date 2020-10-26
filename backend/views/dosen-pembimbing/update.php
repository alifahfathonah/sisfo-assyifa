<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DosenPembimbing */

$this->title = 'Update Dosen Pembimbing: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dosen Pembimbings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dosen-pembimbing-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
