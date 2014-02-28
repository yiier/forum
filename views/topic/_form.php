<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\Topic $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="topic-form">

	<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

		<?= $form->field($model, 'source')->textarea(['rows' => 6]) ?>

		<?= $form->field($model, 'node_id')->textInput() ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
