<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\NilaiKelasKuliah */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nilai Kelas Kuliahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="nilai-kelas-kuliah-view">

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
            'id_kelas_kuliah',
            'nilai_angka',
            'nilai_indeks',
            'nilai_huruf',
        ],
    ]) ?>

</div>
