<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use siakad\assets\AppAsset;
use common\widgets\Alert;
use mdm\admin\components\MenuHelper;
use yii\helpers\Url;
$user = Yii::$app->user;

if($user->can('Mahasiswa'))
{
    $menuItems = [
        ['label' => 'Home', 'url' => Yii::$app->params['frontend_url']],
        ['label' => 'KRS', 'url' => ['krs/index']],
        ['label' => 'KHS', 'url' => ['khs/index']],
        ['label' => 'IPK', 'url' => ['ipk/index']],
        // ['label' => 'Pembayaran dan Tagihan', 'url' => ['index']],
    ];
}
elseif($user->can('Dosen'))
{
    $menuItems = [
        ['label' => 'Home', 'url' => Yii::$app->params['frontend_url']],
        ['label' => 'Kepegawaian', 'url' => ['kepegawaian/index']],
        ['label' => 'Penilaian', 'url' => ['penilaian/index']],
    ];
}


// if (!empty(Yii::$app->user->identity->id)) {
//     $menuHelper = MenuHelper::getAssignedMenu(Yii::$app->user->identity->id);
//     $menuItems = array_merge($menuItems,$menuHelper);
// }

AppAsset::register($this);
\yidas\yii\fontawesome\FontawesomeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="<?=Url::to(['css/home.css'])?>">
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<img src="'.Url::to(['images/logo.png']).'" height="100%" style="display:inline-block"> '.Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-light navbar-fixed-top home-navbar',
        ],
    ]);
    if (Yii::$app->user->isGuest) {
        // $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <<div class="container">
        <div class="bg-white">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <center>
        <p>&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        </center>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
