<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\KuisJawaban */

$this->title = 'Update Kuis Jawaban: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kuis Jawabans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kuis-jawaban-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
