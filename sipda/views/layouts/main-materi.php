<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use sipda\assets\AppAsset;
use common\widgets\Alert;
use mdm\admin\components\MenuHelper;
use yii\helpers\Url;

$menuItems = [
    ['label' => 'Home', 'url' => ['/site/index']],
];
if (!empty(Yii::$app->user->identity->id)) {
    $menuHelper = MenuHelper::getAssignedMenu(Yii::$app->user->identity->id);
    $menuItems = array_merge($menuItems,$menuHelper);
}

AppAsset::register($this);
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
    <style>
    .inputGroup {
	background-color: #fff;
	display: block;
	margin: 10px 0;
	position: relative;
  }
  .inputGroup label {
	border:1px solid #333;
	padding: 12px 30px;
	width: 100%;
	display: block;
	text-align: left;
	color: #3C454C;
	cursor: pointer;
	position: relative;
	z-index: 2;
	-webkit-transition: color 200ms ease-in;
	transition: color 200ms ease-in;
	overflow: hidden;
  }
  .inputGroup label:before {
	width: 10px;
	height: 10px;
	border-radius: 50%;
	content: '';
	background-color: #5562eb;
	position: absolute;
	left: 50%;
	top: 50%;
	-webkit-transform: translate(-50%, -50%) scale3d(1, 1, 1);
			transform: translate(-50%, -50%) scale3d(1, 1, 1);
	-webkit-transition: all 300ms cubic-bezier(0.4, 0, 0.2, 1);
	transition: all 300ms cubic-bezier(0.4, 0, 0.2, 1);
	opacity: 0;
	z-index: -1;
  }
  .inputGroup label:after {
	width: 32px;
	height: 32px;
	content: '';
	border: 2px solid #D1D7DC;
	background-color: #fff;
	background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M5.414 11L4 12.414l5.414 5.414L20.828 6.414 19.414 5l-10 10z' fill='%23fff' fill-rule='nonzero'/%3E%3C/svg%3E ");
	background-repeat: no-repeat;
	background-position: 2px 3px;
	border-radius: 50%;
	z-index: 2;
	position: absolute;
	right: 30px;
	top: 50%;
	-webkit-transform: translateY(-50%);
			transform: translateY(-50%);
	cursor: pointer;
	-webkit-transition: all 200ms ease-in;
	transition: all 200ms ease-in;
  }
  .inputGroup input:checked ~ label {
	color: #fff;
  }
  .inputGroup input:checked ~ label:before {
	-webkit-transform: translate(-50%, -50%) scale3d(56, 56, 1);
			transform: translate(-50%, -50%) scale3d(56, 56, 1);
	opacity: 1;
  }
  .inputGroup input:checked ~ label:after {
	background-color: #54E0C7;
	border-color: #54E0C7;
  }
  .inputGroup input {
	width: 32px;
	height: 32px;
	-webkit-box-ordinal-group: 2;
			order: 1;
	z-index: 2;
	position: absolute;
	right: 30px;
	top: 50%;
	-webkit-transform: translateY(-50%);
			transform: translateY(-50%);
	cursor: pointer;
	visibility: hidden;
  }
    </style>
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

	<div class="container">
        <div class="bg-white" style="overflow:auto">
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
