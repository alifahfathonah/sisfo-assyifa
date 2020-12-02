<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Dosen */

$this->title = 'Import';
$this->params['breadcrumbs'][] = ['label' => 'Negara', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dosen-create">
<div class="card shadow mb-4">
<div class="card-body">
    <?= $this->render('_form_import', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
