<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Kelas */

$this->title = 'Create Kelas';
$this->params['breadcrumbs'][] = ['label' => 'Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelas-create">
<div class="card shadow mb-4">
<div class="card-body">

    <?= $this->render('_form', [
        'model' => $model,
        'prodies' => $prodies,
        'tahun_akademik' => $tahun_akademik,
    ]) ?>

</div>
</div>
</div>
