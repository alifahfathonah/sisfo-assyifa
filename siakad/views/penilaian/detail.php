<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Jadwal */

$this->title = $model->nama_mata_kuliah.' - '.$model->kelas->nama;
$this->params['breadcrumbs'][] = ['label' => 'Penilaian', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="jadwal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nama_mata_kuliah',
            [
                'attribute'=>'kelas',
                'value'=>function($model){
                    return $model->kelas->nama;
                }
            ],
            [
                'attribute'=>'sks',
                'value'=>function($model){
                    return $model->mataKuliah->prodi->bobot_sks;
                }
            ],
        ],
    ]) ?>

    <div class="table-responsive">
    <?php $form = ActiveForm::begin(['action'=>['penilaian/create','jadwal_id'=>$model->jadwal_id]]); ?>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Mahasiswa</th>
            <th>Nilai Angka</th>
            <th>Nilai Huruf</th>
        </tr>
        <?php foreach($model->kelas->mahasiswas as $key => $mhs): ?>
        <tr>
            <td><?=++$key?></td>
            <td><?=$mhs->NIM?></td>
            <td><?=$mhs->nama?></td>
            <td>
            <?= Html::input('number', 'nilai_angka['.$mhs->id.']',isset($penilaian[$mhs->id])?$penilaian[$mhs->id]['nilai_angka']:0,['class'=>'form-control','min'=>0,'max'=>4,'step'=>'any']) ?>
            </td>
            <td>
            <?= Html::radioList('nilai_huruf['.$mhs->id.']',isset($penilaian[$mhs->id])?$penilaian[$mhs->id]['nilai_huruf']:'E',[
                'A' => 'A',
                'B' => 'B',
                'C' => 'C',
                'D' => 'D',
                'E' => 'E',
            ]) ?>
            </td>
        </tr>
        <?php endforeach ?>
    </table>

    <button class="btn btn-success">Simpan</button>
    <?php ActiveForm::end(); ?>
    </div>

</div>
