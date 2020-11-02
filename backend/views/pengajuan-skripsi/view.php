<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PengajuanSkripsi */

$this->title = $model->mahasiswa->nama.' - '.$model->judul;
$this->params['breadcrumbs'][] = ['label' => 'Pengajuan Skripsi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pengajuan-skripsi-view">
<div class="card shadow mb-4">
<div class="card-body">
    <h4><?= Html::encode($this->title) ?></h4>

    <p>
        <?php if($model->status == 'SEDANG DI PROSES'): ?>
        <?= Html::a('Terima', ['update-status', 'id' => $model->id, 'status'=>'ACC'], [
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => 'apakah anda yakin untuk menerima judul skripsi ini ?',
                'method' => 'post',
            ],
        ]) ?>
        
        <?= Html::a('Tolak', ['update-status', 'id' => $model->id, 'status'=>'DI TOLAK'], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'apakah anda yakin untuk menolak judul skripsi ini ?',
                'method' => 'post',
            ],
        ]) ?>
        <?php
        endif;
         /*
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        */ ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'judul',
            'konten:raw',
            'status',
            [
                'attribute'=>'file_url',
                'format' => 'raw',
                'value'=>function($model){
                    return Html::a('Download',Yii::$app->params['frontend_url'].'/uploads/'.$model->file_url,['target'=>'_blank']);
                }
            ],
        ],
    ]) ?>

</div>
</div>
</div>
