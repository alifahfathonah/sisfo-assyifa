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
<script src="https://cdn.ckeditor.com/4.15.0/basic/ckeditor.js"></script>
<script>
    var jumlah = '<?= count($parent->childs); ?>';
</script>
<div class="materi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="materi-form">

        <?php foreach($parent->childs as $soal): ?>
        <div class="panel-group">
            <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapse<?=$soal->no_urut?>"><?=$soal->judul?></a>
                <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', ['materi/hapus-soal', 'id' => $soal->id,'jadwal_id'=>$jadwal_id, 'parent_id'=>$parent->id], [
                    'class'=> 'pull-right',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        // 'method' => 'post',
                    ],
                ]) ?>
                </h4>
                <div class="clearfix"></div>
            </div>
            <div id="collapse1" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="kontent[]" class="editor1"><?=$soal->konten?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Jawaban</label>
                        <?php foreach($soal->childs as $jawaban): ?>
                        <div class="panel-jawaban jawaban<?=$jawaban->id?>">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" <?=$jawaban->tipe == 'Jawaban Benar' ? 'checked' : ''?> name="status[<?=$soal->id?>]" value="<?=$jawaban->id?>" aria-label="Jawaban Benar">
                                </span>
                                <input type="text" class="form-control" name="jawaban[<?=$soal->id?>][<?=$jawaban->id?>]" id="" value="<?=$jawaban->konten?>">
                            </div><!-- /input-group -->
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <?php endforeach ?>

        <div class="additional"></div>

        <div class="form-group">
            <button class="btn btn-success" type="button" onclick="pushElement()">Tambah Soal</button>
            <button class="btn btn-success" onclick="submitForm()">Simpan</button>
        </div>

    </div>
</div>

<script>
    // var element = [
    //     {
    //         konten:'',
    //         no_urut:'',
    //         jawaban:[
    //             {
    //                 konten:'',
    //                 tipe:'',
    //                 no_urut:''
    //             }
    //         ]
    //     }
    // ]
    var element = []
    
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
        element.splice(index, 1);
        init()
    }

    function removeJawaban(index, idx)
    {
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
        
        CKEDITOR.replaceAll('editor', {height: 100});

        // CKEDITOR.instances.forEach((itc, idx) => {
        //     itc.on('change', setOnChange)
        // })

        for (var i in CKEDITOR.instances) {
            CKEDITOR.instances[i].on('blur', setOnChange);
        }
    }

    function setOnChange(event)
    {
        var idx = Object.keys(CKEDITOR.instances).indexOf(event.editor.name);
        // console.log(event, idx)
        // console.log(event.editor.getData())
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
                    <input type="text" class="form-control" name="jawaban[${urut}][${idx}]" value="${element[index].jawaban[idx].konten}" onchange="element[${index}].jawaban[${idx}].konten=this.value">
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
        // for (var i in CKEDITOR.instances) {
        //     var idx = Object.keys(CKEDITOR.instances).indexOf(i);
        //     element[idx].konten = CKEDITOR.instances[i].getData()
        // }
        console.log(element)
    }

    function changeState(index, idx)
    {
        element[index].childs.forEach(val => val.tipe = 'Jawaban Salah')
        element[index].childs[idx].tipe='Jawaban Benar'
    }

    CKEDITOR.replaceAll('editor', {height: 100});
</script>
