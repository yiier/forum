<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\models\LoginForm $model
 */
$this->title = '登录';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
	<h1><?= Html::encode($this->title) ?></h1>

	<p>请填写以下信息登录:</p>

	<div class="row">
		<div class="col-lg-5">
			<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
				<?= $form->field($model, 'username') ?>
				<?= $form->field($model, 'password')->passwordInput() ?>
				<?= $form->field($model, 'rememberMe')->checkbox() ?>
				<div style="color:#999;margin:1em 0">
					如果您忘记了您的密码，您可以 <?= Html::a('重新设置', ['site/request-password-reset']) ?>.
				</div>
				<div class="form-group">
					<?= Html::submitButton('登录', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
				</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>