<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Dosen */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Dosen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dosen-view">
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
            'NIDN',
            'nama',
            'jenis_kelamin',
            'status',
            [
                'attribute'=>'User',
                'value'=>function($model)
                {
                    return $model->user->username;
                }
            ],
            'created_at',
        ],
    ]) ?>

</div>
</div>
</div>
