<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RiwayatPendidikanDosen */

$this->title = 'Create Riwayat Pendidikan Dosen';
$this->params['breadcrumbs'][] = ['label' => 'Riwayat Pendidikan Dosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="riwayat-pendidikan-dosen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
