<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MateriItem */

$this->title = 'Create Materi Item';
$this->params['breadcrumbs'][] = ['label' => 'Materi Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materi-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
