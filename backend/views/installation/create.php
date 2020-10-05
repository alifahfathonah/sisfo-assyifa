<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Installation */

$this->title = 'Create Installation';
$this->params['breadcrumbs'][] = ['label' => 'Installations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="installation-create">
<div class="card shadow mb-4">
<div class="card-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
