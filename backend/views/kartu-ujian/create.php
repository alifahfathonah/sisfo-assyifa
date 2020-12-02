<?php

use yii\helpers\Html;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\KartuUjian */

$this->title = 'Create Kartu Ujian';
$this->params['breadcrumbs'][] = ['label' => 'Kartu Ujian', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kartu-ujian-create">
<div class="card shadow mb-4">
<div class="card-body">

<div class="kartu-ujian-form">

<?php $form = ActiveForm::begin(); ?>


<?= $form->field($model, 'id_semester')->widget(Select2::classname(), [
    'data' => $semester,
    'options' => ['placeholder' => '- Pilih Semester -'],
    'pluginOptions' => [
        'tags'=>true,
        'allowClear' => true,
    ],
])->label('Semester'); ?>

<div class="form-group">
    <label for="">Angkatan</label>
    <?= Select2::widget([
        'name' => 'angkatan',
        'value' => isset($_POST['angkatan'])?$_POST['angkatan']:'',
        'data' => $semester,
        'options' => [
            'placeholder' => '- Pilih Angkatan -',
        ],
    ]);
    ?>
</div>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>

</div>
</div>
</div>
