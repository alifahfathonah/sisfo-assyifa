<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Jadwal */

$this->title = $model->dosenPengampuh->dosen->nama.' - '.$model->dosenPengampuh->mataKuliah->nama;
$this->params['breadcrumbs'][] = ['label' => 'Jadwal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="jadwal-view">
<div class="card shadow mb-4">
<div class="card-body">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'Dosen Mata Kuliah',
                'value' => function($model){
                    return $model->dosenPengampuh->dosen->nama.' - '.$model->dosenPengampuh->mataKuliah->nama;
                }
            ],
            'hari',
            'waktu_mulai',
            'waktu_selesai',
            'created_at',
        ],
    ]) ?>

</div>
</div>

<div class="card shadow mb4">
    <div class="card-body">
        <h2>Penilaian</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Mahasiswa</th>
                    <th>Nilai Angka</th>
                    <th>Nilai Huruf</th>
                </tr>
                <?php foreach($model->penilaians as $key => $value): ?>
                <tr>
                    <td><?=++$key?></td>
                    <td><?=$value->mahasiswa->NIM?></td>
                    <td><?=$value->mahasiswa->nama?></td>
                    <td><?=$value->nilai_angka?></td>
                    <td><?=$value->nilai_huruf?></td>
                </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>
</div>
