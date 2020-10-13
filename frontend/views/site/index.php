<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Sistem Informasi STIKES As-Syifa';
?>
<div class="site-index">

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
