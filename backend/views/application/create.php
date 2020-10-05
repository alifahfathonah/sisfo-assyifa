<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Application */

$this->title = 'Create Application';
$this->params['breadcrumbs'][] = ['label' => 'Application', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-create">
<div class="card shadow mb-4">
<div class="card-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
