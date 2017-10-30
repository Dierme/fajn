<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\LoginAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\bootstrap\Modal;

LoginAsset::register($this);
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
	<link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>

	<?php $this->head() ?>
</head>
<body>

	
<?php $this->beginBody() ?>
<div id="container2" class="cls-container">
		
	
		<div id="bg-overlay" class="bg-img img-balloon"></div>

		<div class="cls-header cls-header-lg">
			<div class="cls-brand">
				<a class="box-inline" href="http://cifr.us">
					<img alt="Guestrack" src="/images/banner_clientside_03.png" style="width:200px; height: auto; opacity: 1" class="brand-icon">
<!--					<center><h2 style="font-size: 14px; margin: 0px;">CIFRUS<sup>Опрос</sup></h2></center>-->
				</a>
			</div>
		</div>
		
		<?= $content ?>
	</div>


<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>