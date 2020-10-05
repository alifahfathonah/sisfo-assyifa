<?php

use yii\helpers\Html;
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
</div>
