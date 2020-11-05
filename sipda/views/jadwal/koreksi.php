<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Jadwal */

$this->title = 'Koreksi Berkas: ' . $model->mahasiswa->nama;
$this->params['breadcrumbs'][] = ['label' => 'Jadwal', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->praktek->instansi, 'url' => ['praktek', 'id' => $model->praktek_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="koreksi-form">

        <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

        <?= $form->field($model, 'file_koreksi_url')->input('file') ?>

        <?= $form->field($model, 'keterangan')->textarea() ?>

        <div class="form-group">
            <?= Html::submitButton('Koreksi', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

    

</div>
