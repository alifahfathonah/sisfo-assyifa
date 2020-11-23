<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AktivitasMengajarDosen */

$this->title = 'Create Aktivitas Mengajar Dosen';
$this->params['breadcrumbs'][] = ['label' => 'Aktivitas Mengajar Dosens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aktivitas-mengajar-dosen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
