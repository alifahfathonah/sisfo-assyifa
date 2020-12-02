<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DosenPengajar */

$this->title = 'Create Dosen Pengajar';
$this->params['breadcrumbs'][] = ['label' => 'Dosen Pengajars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dosen-pengajar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
