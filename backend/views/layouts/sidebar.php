<?php
use yii\helpers\Url;
use hoaaah\sbadmin2\widgets\Menu;
use mdm\admin\components\MenuHelper;

if (!empty(Yii::$app->user->identity->id)) {
    $items = [
        ['label' => 'Home', 'url' => ['/site/index']],
    ];

    $items = array_merge($items,MenuHelper::getAssignedMenu(Yii::$app->user->identity->id));
} else {
    $items = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'Login', 'url' => ['/site/login']]
    ];
}

echo Menu::widget([
    'options' => [
        'ulClass' => "navbar-nav bg-gradient-primary sidebar sidebar-dark accordion",
        'ulId' => "accordionSidebar"
    ], //  optional
    'brand' => [
        'url' => ['/'],
        'content' => '
        <div class="sidebar-brand-icon">
        <img src="'.Url::to(['/images/logo.png']).'" height="40px">
        </div>
        <div class="sidebar-brand-text mx-3">As-Syifa</div>'
    ],
    'items' => $items
]);