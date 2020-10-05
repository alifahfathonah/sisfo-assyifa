<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MataKuliahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mata Kuliah';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mata-kuliah-index">
<div class="card shadow mb-4">
<div class="card-body">
    <p>
        <?= Html::a('Create Mata Kuliah', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'kode',
            'nama',

            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' =>  function($url,$model) {
                        return Html::a('<i class="fa fa-pencil-alt"></i>', $url, [
                            'title' => Yii::t('app', 'update')
                        ]);
                    },
                    'view' =>  function($url,$model) {
                        return Html::a('<i class="fa fa-eye"></i>', $url, [
                            'title' => Yii::t('app', 'view')
                        ]);
                    },
                    'delete' => function($url,$model) {
                        return Html::a('<i class="fa fa-trash"></i>', $url, [
                            'title' => Yii::t('app', 'delete')
                        ]);
                    }
                 ]
            ],
        ],
    ]); ?>


</div>
</div>
</div>
