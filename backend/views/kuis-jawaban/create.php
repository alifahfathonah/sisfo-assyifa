<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\KuisJawaban */

$this->title = 'Create Kuis Jawaban';
$this->params['breadcrumbs'][] = ['label' => 'Kuis Jawabans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kuis-jawaban-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
