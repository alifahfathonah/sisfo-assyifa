<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MataKuliahProdi */

$this->title = 'Create Mata Kuliah Prodi';
$this->params['breadcrumbs'][] = ['label' => 'Mata Kuliah Prodi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mata-kuliah-prodi-create">
<div class="card shadow mb-4">
<div class="card-body">
    <?= $this->render('_form', [
        'model' => $model,
        'mata_kuliah' => $mata_kuliah,
        'prodi' => $prodi,
        'tahun_akademik' => $tahun_akademik,
    ]) ?>

</div>
</div>
</div>
