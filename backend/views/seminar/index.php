<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SeminarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Seminar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seminar-index">
<div class="card shadow mb-4">
<div class="card-body">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php /*
    <p>
        <?= Html::a('Create Seminar', ['create'], ['class' => 'btn btn-success']) ?>
    </p> */ ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'nim',
                'value' => 'mahasiswa.NIM'
            ],
            [
                'attribute' => 'mahasiswa',
                'value' => 'mahasiswa.nama'
            ],
            'judul',
            'nilai_harapan',
            'nilai_didapat',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'delete' => function()
                    {
                        return '';
                    }
                ]
            ],
        ],
    ]); ?>


</div>
</div>
</div>
