<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Sistem Informasi STIKES As-Syifa';
?>
<div class="site-index">

    <div class="jumbotron">
        <img src="<?=Url::to(['images/logo.png'])?>" width="150px" alt="Logo STIKES As-Syifa">
        <h1>Selamat Datang!</h1>

        <p class="lead">Ini adalah sistem informasi pembelajaran daring (SIPDA) STIKES As-Syifa Kisaran Kabupaten Asahan.</p>

        <?php if(Yii::$app->user->isGuest): ?>
        <p><a class="btn btn-lg btn-success" href="<?= Url::to(['site/login'])?>">Klik Untuk Memulai</a></p>
        <?php endif ?>
    </div>

    <div class="body-content">

    </div>
</div>
