<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\Node $model
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '节点', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="node-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
		<?php echo Html::a('删除', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => Yii::t('app', 'Are you sure to delete this item?'),
				'method' => 'post',
			],
		]); ?>
		<?= Html::a('发帖', ['topic/create', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
	</p>

	<?php echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'id',
			'name',
			'summary',
			'topics_count',
			'lft',
			'rgt',
			'level',
		],
	]); ?>

</div>
