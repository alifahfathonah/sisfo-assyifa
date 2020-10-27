<?php
use yii\helpers\Url;
?>
<ul class="list-group">
    <li class="list-group-item">
        <b>Navigasi</b> 
    </li>
    <li class="list-group-item">
        <a href="<?=Url::to(['e-skripsi/index'])?>">List Judul</a>
    </li>
    <li class="list-group-item">
        <a href="<?=Url::to(['e-skripsi/dosen-pembimbing'])?>">Dosen Pembimbing</a>
    </li>
    <li class="list-group-item">
        <a href="<?=Url::to(['e-skripsi/seminar'])?>">Pengajuan Seminar</a>
    </li>
</ul>