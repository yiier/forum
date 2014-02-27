<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\search\NodeSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="node-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'name') ?>

		<?= $form->field($model, 'summary') ?>

		<?= $form->field($model, 'topics_count') ?>

		<?= $form->field($model, 'lft') ?>

		<?php // echo $form->field($model, 'rgt') ?>

		<?php // echo $form->field($model, 'level') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
