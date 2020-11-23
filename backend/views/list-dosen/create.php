<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ListDosen */

$this->title = 'Create List Dosen';
$this->params['breadcrumbs'][] = ['label' => 'List Dosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="list-dosen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
