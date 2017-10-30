<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use backend\assets\NiftyAsset;
use common\widgets\Alert;
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
<!--    <link rel="icon" type="image/png" href="//cifr.us/resources/template/img/cifrus_c.ico" />-->
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div id="container" class="effect mainnav-xs">
    <div class="boxed">
        <div id="content-container">
            <div id="page-content">
                <?= $content ?>
            </div>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>