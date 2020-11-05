<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Praktek */

$this->title = 'Update Jadwal PKK';
$this->params['breadcrumbs'][] = ['label' => 'Jadwal PKK', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="praktek-update">
<div class="card shadow mb-4">
<div class="card-body">
    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
        'tahunAkademik' => $tahunAkademik,
    ]) ?>

</div>
</div>
</div>
