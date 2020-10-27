<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Pengajuan Judul Skripsi';
$this->params['breadcrumbs'][] = ['label' => 'Skripsi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>
    <div class="materi-form">

        <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

        <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'konten')->textarea(['rows' => 6,'id'=>'editor1']) ?>

        <?= $form->field($model, 'file_url')->input('file') ?>

        <div class="form-group">
            <?= Html::submitButton('Ajukan', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
    <script>
        CKEDITOR.replace('editor1', {
        extraPlugins: 'embed,autoembed,image2',
        height: 500,

        // Load the default contents.css file plus customizations for this sample.
        contentsCss: [
            'http://cdn.ckeditor.com/4.14.0/full-all/contents.css',
            'https://ckeditor.com/docs/vendors/4.14.0/ckeditor/assets/css/widgetstyles.css'
        ],
        // Setup content provider. See https://ckeditor.com/docs/ckeditor4/latest/features/media_embed
        embed_provider: '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}',

        // Configure the Enhanced Image plugin to use classes instead of styles and to disable the
        // resizer (because image size is controlled by widget styles or the image takes maximum
        // 100% of the editor width).
        image2_alignClasses: ['image-align-left', 'image-align-center', 'image-align-right'],
        image2_disableResizer: true,
        filebrowserUploadUrl: "<?= Url::to(['image-upload'])?>",
        filebrowserUploadMethod:"form"
        });
        
    </script>

</div>
