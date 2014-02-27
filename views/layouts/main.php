<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\widgets\Alert;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>
<body>
	<?php $this->beginBody() ?>
	<div class="wrap">
		<?php
			NavBar::begin([
				'brandLabel' => 'Yiier',
				'brandUrl' => Yii::$app->homeUrl,
				'options' => [
					'class' => 'navbar-default',
				],
			]);
			$menuItems = [
				['label' => '首页', 'url' => ['/site/index']],
				['label' => '社区', 'url' => ['/topic/index']],
				['label' => 'wiki', 'url' => ['/wiki/index']],
				['label' => '会员', 'url' => ['/user/index']],
				['label' => '分类', 'url' => ['/node/index']],
				['label' => '关于', 'url' => ['/site/about']],
				['label' => '联系', 'url' => ['/site/contact']],
			];
			if (Yii::$app->user->isGuest) {
				$menuItems2[] = ['label' => '注册', 'url' => ['/site/signup']];
				$menuItems2[] = ['label' => '登录', 'url' => ['/site/login']];
			} else {
				$menuItems2[] = [
					'label' => Yii::$app->user->identity->username, 
					'url' => '#', 
			        'items' => [
			        	['label' => '我的帖子', 'url' => '/'],
			        	['label' => '个人设置', 'url' => '/'],
			            ['label' => '退出', 'url' => ['/site/logout']],
			        ],
			        ];
			}
			echo Nav::widget([
				'options' => ['class' => 'navbar-nav'],
				'items' => $menuItems,
			]);
			echo '<form class="navbar-form navbar-left" role="search">
		      <div class="form-group">
		        <input type="text" class="form-control" placeholder="Search">
		      </div>
		    </form>';
			echo Nav::widget([
				'options' => ['class' => 'navbar-nav navbar-right'],
				'items' => $menuItems2,
			]);
			NavBar::end();
		?>

		<div class="container">
		<?= Breadcrumbs::widget([
			'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			// 'homeLink' => false
		]) ?>
		<?= Alert::widget() ?>
		<?= $content ?>
		</div>
	</div>
	
	<footer class="footer">
		<div class="container">
		<p class="pull-left">&copy; Yiier <?= date('Y') ?></p>
		<p class="pull-right"><?= Yii::powered() ?></p>
		</div>
	</footer>

	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
