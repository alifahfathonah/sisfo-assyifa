<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MahasiswaBaru */

$this->title = 'Penerimaan Mahasiswa Baru';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mahasiswa-baru-create">
<div class="card shadow mb-4">
<div class="card-body">

    <?= $this->render('_form', [
        'model' => $model,
        'prodi' => $prodi,
        'wilayah' => [],
        'agama' => $agama,
        'semester' => $semester,
        'jalur_masuk' => $jalur_masuk,
        'negara' => $negara,
    ]) ?>

</div>
</div>
</div>
