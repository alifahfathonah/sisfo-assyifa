<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MahasiswaKhs */

$this->title = 'Create Mahasiswa Khs';
$this->params['breadcrumbs'][] = ['label' => 'Mahasiswa Khs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mahasiswa-khs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
