<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AbsensiMahasiswa */

$this->title = 'Update Absensi Mahasiswa: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Absensi Mahasiswas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="absensi-mahasiswa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'mahasiswa' => $mahasiswa,
    ]) ?>

</div>
