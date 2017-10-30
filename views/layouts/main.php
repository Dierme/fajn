<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\NiftyAsset;
use yii\helpers\Url;

NiftyAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>

    <link rel="icon" type="image/png" href="/images/uk-flag.ico" />
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div id="container" class="effect mainnav-sm">

    <!--NAVBAR-->
    <!--===================================================-->
    <header id="navbar">
        <div id="navbar-container" class="boxed">

            <!--Brand logo & name-->
            <!--================================-->
            <div class="navbar-header">
                <a href="/" class="navbar-brand">
                    <img src="/images/uk-flag.ico" alt="Guestrack Logo" class="brand-icon">
                    <div class="brand-title">
                      <span class="brand-text"> Wordy</span>
                    </div>
                </a>
            </div>
            <!--================================-->
            <!--End brand logo & name-->


            <!--Navbar Dropdown-->
            <!--================================-->
            <div class="navbar-content clearfix">
                <ul class="nav navbar-top-links pull-left">

                    <!--Navigation toogle button-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <li class="tgl-menu-btn">
                        <a class="mainnav-toggle" href="#">
                            <i class="fa fa-navicon fa-lg"></i>
                        </a>
                    </li>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End Navigation toogle button-->



                    
                </ul>
                <ul class="nav navbar-top-links pull-right">
                    <li class="dropdown">
							
                    </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End language selector-->
                    <!--User dropdown-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <li id="dropdown-user" class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="pull-right">
                                    <img class="/img-circle img-user media-object" src="/images/av<?=round(rand(0.5, 3.5), 1)?>.png" alt="Profile Picture">
                                </span>
                            <div class="username hidden-xs"><?= Yii::$app->user->identity->email ?? 'Login' ?></div>
                        </a>


                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right panel-default">

                            <!-- User dropdown menu -->
                            <!-- Dropdown footer -->
                            <div class="pad-all text-right">
                                <a href="<?= Url::toRoute('site/logout')?>" data-method="post" class="btn btn-primary">
                                    <i class="fa fa-sign-out fa-fw"></i> <?= Yii::t('app', 'Выйти')?>
                                </a>
                            </div>
                        </div>
                    </li>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End user dropdown-->

                </ul>
            </div>
            <!--================================-->
            <!--End Navbar Dropdown-->

        </div>
    </header>
    <!--===================================================-->
    <!--END NAVBAR-->

    <div class="boxed">

        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content-container">
            <!--Page Title-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <br>
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <!--End page title-->


            <!--Breadcrumb-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <!--End breadcrumb-->




            <!--Page content-->
            <!--===================================================-->
            <div id="page-content">
                <div id="flash-alerts">
                    <?php if (Yii::$app->session->hasFlash('success')): ?>
                        <div class="alert alert-success alert-dismissable jellyIn">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="icon fa fa-check"></i> <?=Yii::t('app','Success').'!'?></h4>
                        <?= Yii::$app->session->getFlash('success') ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (Yii::$app->session->hasFlash('failure')): ?>
                        <div class="alert alert-danger alert-dismissable jellyIn">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="icon fa fa-times"></i> <?=Yii::t('app','Failure').'!'?></h4>
                        <?= Yii::$app->session->getFlash('failure') ?>
                        </div>
                    <?php endif; ?>
                    
                     <?php if (Yii::$app->session->hasFlash('warning')): ?>
                        <div class="alert alert-warning alert-dismissable jellyIn">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="icon fa fa-exclamation-triangle"></i> <?=Yii::t('app','Warning').'!'?></h4>
                        <?= Yii::$app->session->getFlash('warning') ?>
                        </div>
                    <?php endif; ?>
                    </div>
                <?= $content ?>
            </div>
            <!--===================================================-->
            <!--End page content-->



        </div>
        <!--===================================================-->
        <!--END CONTENT CONTAINER-->



        <!--MAIN NAVIGATION-->
        <!--===================================================-->
        <nav id="mainnav-container">
            <div id="mainnav">
                <div id="mainnav-shortcut">
                    <ul class="list-unstyled">

                    </ul>
                </div>
                <div id="mainnav-menu-wrap">
                    <div class="nano">
                        <div class="nano-content">
                            <ul id="mainnav-menu" class="list-group">
                                <!--Menu list item-->
                                <li class="">
                                    <a href="<?= Url::toRoute('/', true) ?>">
                                        <i class="fa fa-dashboard"></i>
						                    <span class="menu-title">
												<strong><?= Yii::t('app', 'Main page') ?></strong>
											</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?= Url::toRoute('/project/heartbeat', true) ?>">
                                        <i class="fa fa-dashboard"></i>
						                    <span class="menu-title">
												<strong><?= Yii::t('app', 'Heartbeat') ?></strong>
											</span>
                                    </a>
                                </li>
								<li class="">
                                    <a href="<?= Url::toRoute('/project/clear-heartbeat', true) ?>">
                                        <i class="fa fa-dashboard"></i>
						                    <span class="menu-title">
												<strong><?= Yii::t('app', 'Clear Heartbeat') ?></strong>
											</span>
                                    </a>
                                </li>
								<li class="">
                                    <a href="<?= Url::toRoute('/project/fazograph', true) ?>">
                                        <i class="fa fa-dashboard"></i>
						                    <span class="menu-title">
												<strong><?= Yii::t('app', 'Fazograph') ?></strong>
											</span>
                                    </a>
                                </li>
								<li class="">
                                    <a href="<?= Url::toRoute('/project/adaptation-rgr', true) ?>">
                                        <i class="fa fa-dashboard"></i>
						                    <span class="menu-title">
												<strong><?= Yii::t('app', 'Adaptation RGR') ?></strong>
											</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?= Url::toRoute('/rnk/align', true) ?>">
                                        <i class="fa fa-dashboard"></i>
                                        <span class="menu-title">
                                            <strong><?= Yii::t('app', 'Aligning') ?></strong>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>



    <!-- SCROLL TOP BUTTON -->
    <!--===================================================-->
    <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
    <!--===================================================-->


</div>
<!--===================================================-->
<!-- END OF CONTAINER -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
