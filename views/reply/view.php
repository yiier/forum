<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\Reply $model
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Replies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reply-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
		<?php echo Html::a('Delete', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => Yii::t('app', 'Are you sure to delete this item?'),
				'method' => 'post',
			],
		]); ?>
	</p>

	<?php echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'id',
			'topic_id',
			'content:ntext',
			'user_id',
			'created_at',
			'updated_at',
		],
	]); ?>

</div>
