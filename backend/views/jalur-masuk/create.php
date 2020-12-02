<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\JalurMasuk */

$this->title = 'Create Jalur Masuk';
$this->params['breadcrumbs'][] = ['label' => 'Jalur Masuks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jalur-masuk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
