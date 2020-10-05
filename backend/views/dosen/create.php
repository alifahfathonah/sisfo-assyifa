<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Dosen */

$this->title = 'Create Dosen';
$this->params['breadcrumbs'][] = ['label' => 'Dosen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dosen-create">
<div class="card shadow mb-4">
<div class="card-body">
    <?= $this->render('_form', [
        'model' => $model,
        'user' => $user,
    ]) ?>

</div>
</div>
</div>
