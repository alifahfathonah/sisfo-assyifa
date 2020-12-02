<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PesertaKelasKuliah */

$this->title = 'Create Peserta Kelas Kuliah';
$this->params['breadcrumbs'][] = ['label' => 'Peserta Kelas Kuliahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peserta-kelas-kuliah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
