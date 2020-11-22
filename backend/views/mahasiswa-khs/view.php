<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MahasiswaKhs */

$this->title = "KHS ".$model->nama_mahasiswa;
$this->params['breadcrumbs'][] = ['label' => 'Mahasiswa Khs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mahasiswa-khs-view">
<div class="card shadow mb-4">
<div class="card-body">
    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?php if(Yii::$app->user->can('Master')): ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php endif ?>
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
            'id',
            'id_registrasi_mahasiswa',
            'id_prodi',
            'nama_program_studi',
            'id_periode',
            'id_matkul',
            'nama_mata_kuliah',
            'id_kelas',
            'nama_kelas_kuliah',
            'sks_mata_kuliah',
            'nilai_angka',
            'nilai_huruf',
            'nilai_index',
            'nim',
            'nama_mahasiswa',
            'angkatan',
        ],
    ]) ?>

</div>
</div>
</div>
