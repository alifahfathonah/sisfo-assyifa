<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PengajuanSkripsi */

$this->title = 'Create Pengajuan Skripsi';
$this->params['breadcrumbs'][] = ['label' => 'Pengajuan Skripsis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengajuan-skripsi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
