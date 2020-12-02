<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ListProdi */

$this->title = 'Update List Prodi: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'List Prodis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="list-prodi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
