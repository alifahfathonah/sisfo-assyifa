<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AbsensiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penyimpanan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bg-white">
<div class="absensi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <div class="hidden">
    <form action="<?=Url::to(['site/penyimpanan'])?>" enctype="multipart/form-data" id="formImport" method="post">
    <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
    <input type="hidden" name="ImportFile[tipe]" value="tipe" />
    <input type="file" multiple="true" name="ImportFile[file][]" id="fileSoal" onchange="if(confirm('Apakah anda yakin akan mengupload berkas ?')){formImport.submit()}">
    </form>
    </div>
    <button class="btn btn-primary" onclick="fileSoal.click()">Upload</button>
    </p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="table-responsive">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nama',
            [
                'attribute' => 'berkas',
                'format' => 'raw',
                'value' => function($model)
                {
                    return Html::a($model->berkas,['uploads/'.$model->berkas]);
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function($url, $model) {
                        return '';
                    },
                    'update' => function($url, $model) {
                        return '';
                    },
                    'delete' => function($url, $model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-trash"></span>',
                            ['site/hapus-penyimpanan','id'=>$model->id],
                            [
                                'data-method' => 'post',
                                'data-confirm' => 'are you sure to delete this item ?'
                            ]
                        );
                    }
                ]
            ],
        ],
    ]); ?>

    </div>


</div>
</div>
