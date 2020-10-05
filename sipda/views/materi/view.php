<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Materi */

$this->title = $model->judul;
$this->params['breadcrumbs'][] = ['label' => 'Materi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="materi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'judul',
            'konten:raw',
            'status',
            'no_urut',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
