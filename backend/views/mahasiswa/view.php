<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Mahasiswa */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Mahasiswa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mahasiswa-view">
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
            'NIM',
            'nama',
            'jenis_kelamin',
            'status',
            [
                'attribute'=>'user',
                'value'=>function($model){
                    return $model->user->username;
                }
            ],
            [
                'attribute'=>'prodi',
                'value'=>function($model){
                    return $model->prodi->nama;
                }
            ],
        ],
    ]) ?>

</div>
</div>
</div>
