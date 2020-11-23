<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RiwayatFungsionalDosen */

$this->title = 'Create Riwayat Fungsional Dosen';
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Fungsional Dosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="riwayat-fungsional-dosen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
