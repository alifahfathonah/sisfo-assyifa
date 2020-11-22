<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MahasiswaKhs */

$this->title = 'Import KHS';
$this->params['breadcrumbs'][] = ['label' => 'Mahasiswa Khs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mahasiswa-khs-create">
<div class="card shadow mb-4">
<div class="card-body">
    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
