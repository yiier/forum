<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\models\SignupForm $model
 */
$this->title = '注册';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
	<h1><?= Html::encode($this->title) ?></h1>

	<p>请填写以下字段注册:</p>

	<div class="row">
		<div class="col-lg-5">
			<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
				<?= $form->field($model, 'username') ?>
				<?= $form->field($model, 'email') ?>
				<?= $form->field($model, 'password')->passwordInput() ?>
				<div class="form-group">
					<?= Html::submitButton('注册', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
				</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>