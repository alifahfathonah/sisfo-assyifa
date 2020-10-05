<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Absensi */

$this->title = 'Create Absensi';
$this->params['breadcrumbs'][] = ['label' => 'Absensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="absensi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'jadwal' => $jadwal,
    ]) ?>

</div>
