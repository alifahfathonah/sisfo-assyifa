<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DetailBiodataDosen */

$this->title = 'Create Detail Biodata Dosen';
$this->params['breadcrumbs'][] = ['label' => 'Detail Biodata Dosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-biodata-dosen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
