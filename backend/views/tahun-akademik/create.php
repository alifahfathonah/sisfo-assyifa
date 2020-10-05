<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TahunAkademik */

$this->title = 'Create Tahun Akademik';
$this->params['breadcrumbs'][] = ['label' => 'Tahun Akademik', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tahun-akademik-create">
<div class="card shadow mb-4">
<div class="card-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
