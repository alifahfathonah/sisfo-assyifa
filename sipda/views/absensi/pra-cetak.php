<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AbsensiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pra Cetak Absensi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="absensi-index">
    <h1>Pilih Jadwal</h1>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jadwal_id')->widget(Select2::classname(), [
        'data' => $jadwal,
        'options' => ['placeholder' => '- Pilih Jadwal -'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Jadwal'); ?>

    <div class="form-group">
        <?= Html::submitButton('Cetak', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
