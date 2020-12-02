<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ListProdi */

$this->title = 'Create List Prodi';
$this->params['breadcrumbs'][] = ['label' => 'List Prodis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="list-prodi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
