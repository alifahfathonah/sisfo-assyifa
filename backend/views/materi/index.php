<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MateriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Materi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materi-index">
<div class="card shadow mb-4">
<div class="card-body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'dosen',
                'value'=>function($model){
                    return $model->dosenPengampuh->dosen->nama;
                }
            ],
            [
                'attribute'=>'mata_kuliah',
                'value'=>function($model){
                    return $model->dosenPengampuh->mataKuliah->nama;
                }
            ],
            [
                'attribute'=>'kelas',
                'value'=>function($model){
                    return $model->dosenPengampuh->kelas->nama;
                }
            ],
            'judul',
            'status',
            //'no_urut',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' =>  function($url,$model) {
                        return Html::a('<i class="fa fa-eye"></i>', $url, [
                            'title' => Yii::t('app', 'view')
                        ]);
                    },
                 ]
            ],
        ],
    ]); ?>


</div>
</div>
</div>
