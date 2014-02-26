<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\search\TopicSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="topic-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'title') ?>

		<?= $form->field($model, 'content') ?>

		<?= $form->field($model, 'node_id') ?>

		<?= $form->field($model, 'user_id') ?>

		<?php // echo $form->field($model, 'first') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'updated_at') ?>

		<?php // echo $form->field($model, 'replies_count') ?>

		<?php // echo $form->field($model, 'last_reply_user_id') ?>

		<?php // echo $form->field($model, 'replied_at') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
