<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MateriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Materi';
$this->params['breadcrumbs'][] = $this->title;
$columns = [
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
    //'no_urut',
    //'created_at',
    //'updated_at',
];
if(Yii::$app->user->can('Dosen'))
{
    $columns[] = 'status';
    $columns[] = [
        'class' => 'yii\grid\ActionColumn',
        'buttons' => [
            'update' => function($model)
            {
                return '';
            },
            'delete' => function($model)
            {
                return '';
            }
        ]
    ];
}
?>
<div class="materi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="table-responsive">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
    ]); ?>

    </div>


</div>
