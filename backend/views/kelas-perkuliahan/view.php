<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\KelasPerkuliahan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kelas Perkuliahans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kelas-perkuliahan-view">

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
            'id_kelas_kuliah',
            'id_prodi',
            'nama_program_studi',
            'id_semester',
            'nama_semester',
            'id_matkul',
            'kode_mata_kuliah',
            'nama_mata_kuliah',
            'nama_kelas_kuliah',
            'sks',
            'id_dosen',
            'nama_dosen',
            'jumlah_mahasiswa',
            'apa_untuk_pditt',
        ],
    ]) ?>

</div>
