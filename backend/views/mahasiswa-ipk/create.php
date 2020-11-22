<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MahasiswaIpk */

$this->title = 'Import IPK';
$this->params['breadcrumbs'][] = ['label' => 'Mahasiswa Ipks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mahasiswa-ipk-create">
<div class="card shadow mb-4">
<div class="card-body">
    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
