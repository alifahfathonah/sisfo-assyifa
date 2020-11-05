<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Praktek */

$this->title = 'Buat Jadwal';
$this->params['breadcrumbs'][] = ['label' => 'Jadwal PKK', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="praktek-create">
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
