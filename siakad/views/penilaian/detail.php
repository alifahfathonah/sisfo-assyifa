<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Jadwal */

$this->title = $model->nama_mata_kuliah.' - '.$model->nama_kelas_kuliah;
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
            'nama_kelas_kuliah',
            'sks',
        ],
    ]) ?>

    <div class="table-responsive">
    <?php $form = ActiveForm::begin(['action'=>['penilaian/create','id'=>$model->id_kelas_kuliah]]); ?>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Mahasiswa</th>
            <th>Nilai Angka</th>
            <th>Nilai Huruf</th>
        </tr>
        <?php foreach($model->mahasiswas as $key => $mhs): ?>
        <tr>
            <td><?=++$key?></td>
            <td><?=$mhs->nim?></td>
            <td><?=$mhs->nama_mahasiswa?></td>
            <td>
            <?= Html::input('number', 'nilai_angka['.$mhs->id_registrasi_mahasiswa.']',isset($penilaian[$mhs->id_registrasi_mahasiswa])?$penilaian[$mhs->id_registrasi_mahasiswa]['nilai_angka']:0,['class'=>'form-control','min'=>0,'max'=>4,'step'=>'any']) ?>
            </td>
            <td>
            <?= Html::radioList('nilai_huruf['.$mhs->id_registrasi_mahasiswa.']',isset($penilaian[$mhs->id_registrasi_mahasiswa])?$penilaian[$mhs->id_registrasi_mahasiswa]['nilai_huruf']:'E',[
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
