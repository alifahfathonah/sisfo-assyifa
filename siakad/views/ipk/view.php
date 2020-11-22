<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MahasiswaIpk */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mahasiswa Ipks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mahasiswa-ipk-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'id',
            'id_registrasi_mahasiswa',
            'id_mahasiswa',
            'id_semester',
            'nama_semester',
            'nim',
            'nama_mahasiswa',
            'angkatan',
            'id_prodi',
            'nama_program_studi',
            'id_status_mahasiswa',
            'nama_status_mahasiswa',
            'ips',
            'ipk',
            'sks_semester',
            'sks_total',
            'biaya_kuliah_smt',
        ],
    ]) ?>

</div>
