<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Materi */

$this->title = 'Panel Soal : '.$parent->judul;
$this->params['breadcrumbs'][] = ['label' => 'Jadwal', 'url' => ['jadwal/index']];
$this->params['breadcrumbs'][] = ['label' => $model->dosenPengampuh->mataKuliah->nama.' '.$model->dosenPengampuh->kelas->nama, 'url' => ['jadwal/materi','id'=>$jadwal_id]];
$this->params['breadcrumbs'][] = ['label' => $parent->judul, 'url' => ['jadwal/materi','id'=>$jadwal_id,'index'=>$parent->no_urut-1]];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- <script src="https://cdn.ckeditor.com/4.15.0/basic/ckeditor.js"></script> -->
<script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>
<script>
    var jumlah = '<?= count($parent->childs); ?>';
</script>
<div class="materi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="materi-form">
        <div class="msg"></div>
        <div class="additional"></div>
        <div class="form-group">
            <button class="btn btn-success" type="button" onclick="pushElement()">Tambah Soal</button>
            <button class="btn btn-success" onclick="submitForm()">Simpan</button>
        </div>

    </div>
</div>

<script>
    var deletePosts = []
    var element = <?= $all_soal ? json_encode($all_soal) : '[]' ?>

    
    // console.log(element)
    
    function pushElement(){
        element.push({
            id:'',
            konten:'',
            no_urut:'',
            childs:[]
        })
        
        init()
    }

    function removeElement(index)
    {
        var el = element[index]
        if(el.id) deletePosts.push(el.id)
        element.splice(index, 1);
        init()
    }

    function removeJawaban(index, idx)
    {
        var el = element[index].childs[idx]
        if(el.id) deletePosts.push(el.id)
        element[index].childs.splice(idx, 1);
        initJawaban(index)
    }

    function init()
    {
        // CKEDITOR.instances = []
        document.querySelector('.additional').innerHTML = ''
        element.forEach((el,index) => {
            var urut = index+1

            var template = `
                <div class="panel-group">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse${urut}">Soal ${urut}</a>
                        <a href="javascript:void(0)" onclick="removeElement(${index})" class="pull-right"><i class="glyphicon glyphicon-trash"></i></a>
                        </h4>
                        <div class="clearfix"></div>
                    </div>
                    <div id="collapse${urut}" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea name="kontent[${urut}]" id="editor${urut}" class="editor">${element[index].konten}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">No. Urut</label>
                                <input type="text" name="no_urut[${urut}]" onchange="element[${index}].no_urut=this.value" class="form-control" value="${element[index].no_urut}">
                            </div>
                            <div class="form-group">
                                <label for="">Jawaban</label>
                                <div id="additional-answer-${index}"></div>
                                <button class="btn btn-success" onclick="pushJawaban(${index})">Tambah Jawaban</button>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>`;

                document.querySelector('.additional').innerHTML += template

                initJawaban(index)
        })
        
        CKEDITOR.replaceAll('editor', {
            extraPlugins: 'embed,autoembed,image2',
            height: 100,

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
        });

        for (var i in CKEDITOR.instances) {
            CKEDITOR.instances[i].on('change', setOnChange);
        }
    }

    function setOnChange(event)
    {
        var idx = Object.keys(CKEDITOR.instances).indexOf(event.editor.name);
        element[idx].konten = event.editor.getData()
    }

    function pushJawaban(index){
        var jawaban = element[index].childs
        jawaban.push({
            id:'',
            konten:'',
            tipe:'Jawaban Salah',
            no_urut:''
        })

        initJawaban(index)
    }

    function initJawaban(index)
    {
        var jawaban = element[index].childs
        var urut = index+1

        document.querySelector('#additional-answer-'+index).innerHTML = ''

        jawaban.forEach((el,idx) => {
            var checked = el.tipe == 'Jawaban Benar' ? 'checked' : ''
            var template = `
            <p>
            <div class="panel-jawaban jawaban>">
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="radio" name="status[${urut}]" value="${idx}" onchange="changeState(${index},${idx})" ${checked}>
                    </span>
                    <input type="text" class="form-control" name="jawaban[${urut}][${idx}]" value="${element[index].childs[idx].konten}" onchange="element[${index}].childs[${idx}].konten=this.value">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default" onclick="removeJawaban(${index},${idx})"><i class="glyphicon glyphicon-trash"></i></button>
                    </div>
                </div><!-- /input-group -->
            </div></p>`

            document.querySelector('#additional-answer-'+index).innerHTML += template
        })
    }

    function submitForm()
    {
        console.log(element)
        var data = $(this).serializeArray();
        var url = "<?=Url::to(['materi/save-soal','dosen_pengampuh_id'=>$model->dosen_pengampuh_id,'jadwal_id'=>$jadwal_id,'parent_id'=>$parent->id])?>";
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: {
                data:element,
                deletePosts:deletePosts
            }
        })
        .done(function(response) {
            if(response.success)
            {
                document.querySelector('.msg').innerHTML = `
                <div class="alert alert-success" role="alert" id="success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    ${response.message}
                </div>`
            }
            else
            {
                document.querySelector('.msg').innerHTML = `
                <div class="alert alert-danger" role="alert" id="success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    ${response.message}
                </div>`
            }
        })
        .fail(function() {
            console.log("error");
        });
        // var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
        // var request = await fetch("<?=Url::to(['materi/save-soal'])?>",{
        //     method:'POST',
        //     headers:{
        //         'content-type':'application/json'
        //     },
        //     body:JSON.stringify({
        //         data:element,
        //         deletePosts:deletePosts
        //     })
        // })
    }

    function changeState(index, idx)
    {
        element[index].childs.forEach(val => val.tipe = 'Jawaban Salah')
        element[index].childs[idx].tipe='Jawaban Benar'
    }

    init()
</script>
