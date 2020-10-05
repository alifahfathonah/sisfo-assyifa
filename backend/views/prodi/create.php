<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Prodi */

$this->title = 'Create Program Studi';
$this->params['breadcrumbs'][] = ['label' => 'Program Studi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prodi-create">
<div class="card shadow mb-4">
<div class="card-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
