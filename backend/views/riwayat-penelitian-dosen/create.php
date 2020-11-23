<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RiwayatPenelitianDosen */

$this->title = 'Create Riwayat Penelitian Dosen';
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Penelitian Dosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="riwayat-penelitian-dosen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
