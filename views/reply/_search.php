<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\search\ReplySearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="reply-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'topic_id') ?>

		<?= $form->field($model, 'content') ?>

		<?= $form->field($model, 'user_id') ?>

		<?= $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'updated_at') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
