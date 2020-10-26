<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SkripsiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Skripsi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skripsi-index">
<div class="card shadow mb-4">
<div class="card-body">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Buat Skripsi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'tahun_akademik_id',
                'value' => function($model)
                {
                    return $model->tahunAkademik->tahun.' '.$model->tahunAkademik->periode;
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
</div>
</div>
