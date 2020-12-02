<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\JenisPendaftaran */

$this->title = 'Create Jenis Pendaftaran';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Pendaftarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-pendaftaran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
