<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AbsensiMahasiswa */

$this->title = 'Create Absensi Mahasiswa';
$this->params['breadcrumbs'][] = ['label' => 'Absensi Mahasiswa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="absensi-mahasiswa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'mahasiswa' => $mahasiswa,
    ]) ?>

</div>
