<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <nav>
    <div class="navbar-header">
        <a class="item" href="/site/index">
            <img src="/images/bee_logo.png"/>
            <br/>
            <h3 class="caption">Магазин натурального мёда</h3>
        </a>
    </div>
    </nav>
    <?php
    NavBar::begin([
        'options' => [
            'class' => 'navbar navbar-expand-md my-bg',
        ],
    ]);
    $menuItems = [
      ['label' => 'Главная страница', 'url' => ['/site/index'], 'linkOptions' => ['class' => 'my-navbarlabel']],
      ['label' => 'О магазине', 'url' => ['/site/about'], 'linkOptions' => ['class' => 'my-navbarlabel']],
      ['label' => 'Каталог товаров', 'url' => ['/'], 'linkOptions' => ['class' => 'my-navbarlabel']],
      ['label' => 'Доставка и оплата', 'url' => ['/'], 'linkOptions' => ['class' => 'my-navbarlabel']],
      ['label' => 'Контакты', 'url' => ['/site/contact'], 'linkOptions' => ['class' => 'my-navbarlabel']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup'], 'linkOptions' => ['class' => 'my-navbarlabel']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login'], 'linkOptions' => ['class' => 'my-navbarlabel']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout', 'linkOptions' => ['class' => 'my-navbarlabel']]
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-center'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>
<footer class="my-footer mt-auto py-3 text-muted">
    <div class="container">
        <div class="row">
            <div class="col-md-1">
                <img class="float-right footer-image" src="/images/bee_logo.png">
            </div>
            <div class="col-md-2">
                <h4 class="my-navbarlabel">OOO "МЁД"</h4>
                <p class="footer-text"> Натуральный мёд из Чувашии. Сбор только в экологически чистых местах.</p>
            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-2">
                <h5 class="footer-text">Oсновные ссылки</h5>
                <ul class="list-unstyled float-left">
                    <li>
                        <a href="/site/about" class="ul-footer-text float-left">О магазине</a>
                    </li>
                    <li>
                        <a href="#!" class="ul-footer-text float-left">Каталог товаров</a>
                    </li>
                    <li>
                        <a href="#!" class="ul-footer-text float-left">Доставка и оплата</a>
                    </li>
                    <li>
                        <a href="/site/contact" class="ul-footer-text float-left">Контакты</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2">
                <h5 class="footer-text">Категории</h5>
                <ul class="list-unstyled float-left">
                    <li>
                        <a href="#!" class="ul-footer-text float-left">Мёд</a>
                    </li>
                    <li>
                        <a href="#!" class="ul-footer-text float-left">Семена медоносных культур</a>
                    </li>
                    <li>
                        <a href="#!" class="ul-footer-text float-left">Прополис</a>
                    </li>
                    <li>
                        <a href="#!" class="ul-footer-text float-left">Побочные продукты</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2">
                <h5 class="footer-text">Полезные ссылки</h5>
                <ul class="list-unstyled float-left">
                    <li>
                        <a href="#!" class="ul-footer-text float-left">О пользе мёда</a>
                    </li>
                    <li>
                        <a href="#!" class="ul-footer-text float-left">Как собирают мёд</a>
                    </li>
                    <li>
                        <a href="#!" class="ul-footer-text float-left">Наша миссия</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2">
                <h5 class="footer-text">Соц. сети</h5>
                <ul class="list-unstyled float-left">
                    <li>
                        <a href="#!" class="ul-footer-text float-left"><i class="fa fa-vk"></i>VK.com</a>
                    </li>
                    <li>
                        <a href="#!" class="ul-footer-text float-left"><i class="fab fa-facebook-f"></i>Facebook</a>
                    </li>
                    <li>
                        <a href="#!" class="ul-footer-text float-left"><i class="fa fa-instagram"></i>Instagram</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
