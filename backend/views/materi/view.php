<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Materi */

$this->title = $model->judul;
$this->params['breadcrumbs'][] = ['label' => 'Materi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="materi-view">
<div class="card shadow mb-4">
<div class="card-body">
    <h2><?=$model->judul?></h2>
    <span>Oleh : <b><a href="<?=Url::to(['dosen/view','id'=>$model->dosenPengampuh->dosen_id])?>"><?=$model->dosenPengampuh->dosen->nama?></a></b> | Tanggal : <?=$model->created_at?></span>
    <br>
    <p><?=$model->konten?></p>
</div>
</div>
</div>
