<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Materi */

$this->title = 'Soal '.$model->parent->judul;
$this->params['breadcrumbs'][] = ['label' => 'Jadwal', 'url' => ['jadwal/index']];
$this->params['breadcrumbs'][] = ['label' => 'Materi - '.$model->parent->dosenPengampuh->mataKuliah->nama.' '.$model->dosenPengampuh->kelas->nama, 'url' => ['jadwal/materi','id'=>$jadwal_id]];
$this->params['breadcrumbs'][] = ['label' => $model->parent->judul, 'url' => ['jadwal/materi','id'=>$jadwal_id,'index'=>$model->parent->no_urut-1]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="materi-view">

    <h3><?=$model->judul?></h3>
    <?=$model->konten?>

    <br>
    <h4>Jawaban</h4>
    <a href="<?=Url::to(['materi/buat-jawaban','jadwal_id'=>$jadwal_id,'parent_id'=>$model->id])?>" class="btn btn-success">Buat Jawaban</a>
    <p></p>
    <table class="table table-bordered">
        <tr>
            <td>#</td>
            <td>Deskripsi</td>
            <td>Tipe Jawaban</td>
            <td></td>
        </tr>
        <?php if(empty($model->childs)): ?>
        <tr>
            <td colspan="4">
                <i>Tidak ada soal</i>
            </td>
        </tr>
        <?php endif ?>
        <?php foreach($model->childs as $key => $child): ?>
        <tr>
            <td><?=++$key?></td>
            <td><?=$child->konten?></td>
            <td><?=$child->tipe?></td>
            <td>
                <a href="<?=Url::to(['materi/edit-jawaban','id'=>$child->id,'jadwal_id'=>$jadwal_id,'parent_id'=>$model->id])?>">Edit</a>
                |
                <?= Html::a('Hapus', ['materi/hapus-jawaban', 'id' => $child->id, 'jadwal_id'=>$jadwal_id, 'parent_id'=>$model->id], [
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            // 'method' => 'post',
                        ],
                    ]) ?>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
</div>