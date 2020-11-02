<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProdiNilai */

$this->title = 'Buat Prodi Nilai';
$this->params['breadcrumbs'][] = ['label' => 'Prodi Nilai', 'url' => ['index','ProdiNilaiSearch[prodi_id]'=>$model->prodi_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prodi-nilai-create">
<div class="card shadow mb-4">
<div class="card-body">
    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
