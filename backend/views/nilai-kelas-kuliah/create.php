<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NilaiKelasKuliah */

$this->title = 'Create Nilai Kelas Kuliah';
$this->params['breadcrumbs'][] = ['label' => 'Nilai Kelas Kuliahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nilai-kelas-kuliah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
