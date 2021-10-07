<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\components\Nav;

use yii\helpers\Url;
use yii\helpers\Html;

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

<div class="wrapper">

		<header class="header">
			<div class='container'>
				<div class="header__body">
					<a href="#" class="header__logo">
						<img src="/web/img/logo.jpg" alt="Logo">
					</a>
						<div class="header__burger">
							<span></span>
						</div>
						<nav class="header__menu">
                  <?=  Nav::widget([
                                   'options' => ['class' => 'header__list'],
                                           'items' => [  
                                                ['label' => 'ГЛАВНАЯ', 'url' => ['/site/index'],'linkOptions' => ['class' => 'header__link']],
                                                ['label' => 'ОБСУЖДЕНИЯ', 'url' => ['/site/discussions'],'linkOptions' => ['class' => 'header__link']],
                                                            Yii::$app->user->isGuest ?
                                                ['label' => 'ВХОД', 'url' => ['/site/login'],'linkOptions' => ['class' => 'header__link']]: 
                                                '<li>' . Html::beginForm(['/site/logout'], 'post'). Html::submitButton('ВЫХОД (' . Yii::$app->user->identity->username . ')  <i class="fa fa-sign-out" aria-hidden="true"></i>', ['class' => 'btn btn-link logout']). Html::endForm(). '</li>'               
                                            ], 
                                              
                            ]);?>
						</nav>
				</div>
			
		</header>
	
   <main class="main">
      <div class="body__content">
        <?= $content ?>
      </div>
   </main>
   
   <footer class="footer">
   <div class='container'>
      <p class="float-left">&copy; Оленеводы Чукотки <?= date('Y') ?></p>
      <p class="float-right">Тундра</p>
      </div>
   </footer>
   
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
