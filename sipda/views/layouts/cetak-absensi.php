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
    ['label' => 'Home', 'url' => Yii::$app->params['frontend_url']],
];
if (!empty(Yii::$app->user->identity->id)) {
    $menuHelper = MenuHelper::getAssignedMenu(Yii::$app->user->identity->id);
    $menuItems = array_merge($menuItems,$menuHelper);
}

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
</head>
<body>
<?php $this->beginBody() ?>
<?= $content ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
