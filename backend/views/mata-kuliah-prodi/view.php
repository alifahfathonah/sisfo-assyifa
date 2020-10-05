<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MataKuliahProdi */

$this->title = $model->mataKuliah->nama;
$this->params['breadcrumbs'][] = ['label' => 'Mata Kuliah Prodi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mata-kuliah-prodi-view">
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
                'attribute'=>'Tahun Akademik',
                'value'=>function($model){
                    return $model->tahunAkademik->tahun.$model->tahunAkademik->periode;
                }
            ],
            [
                'attribute'=>'Mata Kuliah',
                'value'=>function($model){
                    return $model->mataKuliah->nama;
                }
            ],
            [
                'attribute'=>'Mata Kuliah',
                'value'=>function($model){
                    return $model->prodi->nama;
                }
            ],
            'semester',
            'status',
            'bobot_sks',
        ],
    ]) ?>

</div>
</div>
</div>
