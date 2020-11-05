<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PraktekDosen */

$this->title = 'Tambah Dosen Pengampuh';
$this->params['breadcrumbs'][] = ['label' => 'Dosen Pengampuh PKK', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="praktek-dosen-create">
<div class="card shadow mb-4">
<div class="card-body">
    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
        'dosen' => $dosen,
    ]) ?>

</div>
</div>
</div>
