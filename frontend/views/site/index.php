<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Sistem Informasi STIKES As-Syifa';
?>
<div class="site-index">
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="bg-white" style="margin-bottom:10px;">
                <center>
                    <?php if(Yii::$app->user->can('Dosen')): ?>
                    <img src="<?=Yii::$app->params['frontend_url']?>/images/<?=Yii::$app->user->identity->dosen->jenis_kelamin?>.jpg" alt="<?=Yii::$app->user->identity->dosen->nama?>" width="100%">
                    <b><?=Yii::$app->user->identity->dosen->nama?></b> - <?=Yii::$app->user->identity->dosen->NIDN?><br>
                    <?=Yii::$app->user->identity->dosen->jenis_kelamin?><br>
                    <?php elseif(Yii::$app->user->can('Mahasiswa')): ?>
                    <img src="<?=Yii::$app->params['frontend_url']?>/images/<?=Yii::$app->user->identity->mahasiswa->jenis_kelamin?>.jpg" alt="<?=Yii::$app->user->identity->mahasiswa->nama?>" width="100%">
                    <b><?=Yii::$app->user->identity->mahasiswa->nama?></b> - <?=Yii::$app->user->identity->mahasiswa->NIM?><br>
                    <?=Yii::$app->user->identity->mahasiswa->jenis_kelamin?>
                    <?php endif ?>
                </center>
                <p></p>
                <table class="table table-bordered">
                    <tr>
                        <td>Username : </td>
                        <td><?=Yii::$app->user->identity->username?></td>
                    </tr>
                    <tr>
                        <td>Email : </td>
                        <td><?=Yii::$app->user->identity->email?></td>
                    </tr>
                </table>
                <?= Html::a('<i class="fa fa-pencil"></i> Update Password',Url::to(['change-password']),['class'=>'btn btn-primary btn-block']) ?>
                <p></p>
                <?= Html::a('<i class="fa fa-pencil"></i> Update Email',Url::to(['change-email']),['class'=>'btn btn-warning btn-block']) ?>
            </div>
        </div>
        <div class="col-sm-12 col-md-8">
            <div class="bg-white">
                <div class="jumbotron">
                    <h1>Selamat Datang!</h1>

                    <p class="lead">Ini adalah sistem informasi STIKES As-Syifa Kisaran Kabupaten Asahan.</p>

                    <?php if(Yii::$app->user->isGuest): ?>
                    <p><a class="btn btn-lg btn-success" href="<?= Url::to(['site/login'])?>">Klik Untuk Memulai</a></p>
                    <?php endif ?>
                </div>

                <div class="body-content">
                    <div class="row">
                        <?php foreach($applications as $app): ?>
                        <div class="col-lg-4">
                            <center>
                                <h4><?=$app->nama?></h4>
                                <img src="<?=Yii::$app->params['backend_url']?>/uploads/<?=$app->icon?>" alt="<?=$app->nama?>" width="100px">
                                <br><br>
                                <?php if(in_array($app->nama,['Perpustakaan','OJS'])): ?>
                                <p><a class="btn btn-default" href="<?=$app->url?>">Ke Aplikasi &raquo;</a></p>
                                <?php else: ?>
                                <p><a class="btn btn-default" href="<?=$app->url?>/site/login-by-token?token=<?=Yii::$app->user->identity->auth_key?>">Login Ke Aplikasi &raquo;</a></p>
                                <?php endif ?>
                            </center>
                        </div>
                        <?php endforeach ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
