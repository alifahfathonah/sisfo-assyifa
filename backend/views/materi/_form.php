<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Materi */
/* @var $form yii\widgets\ActiveForm */
?>

<script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>
<div class="materi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dosen_pengampuh_id')->widget(Select2::classname(), [
        'data' => $dosen_mata_kuliah,
        'options' => ['placeholder' => '- Pilih Dosen dan Mata Kuliah -'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'konten')->textarea(['rows' => 6,'id'=>'editor1']) ?>

    <?= $form->field($model, 'status')->dropDownList([
        'Publish'=>'Publish',
        'Private'=>'Private'
    ],['prompt'=>'- Pilih Status -']) ?>

    <?= $form->field($model, 'no_urut')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
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
