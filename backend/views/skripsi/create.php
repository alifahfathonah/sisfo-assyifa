<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Skripsi */

$this->title = 'Buat Skripsi';
$this->params['breadcrumbs'][] = ['label' => 'Skripsis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skripsi-create">
<div class="card shadow mb-4">
<div class="card-body">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'tahunAkademik' => $tahunAkademik,
    ]) ?>

</div>
</div>
</div>
