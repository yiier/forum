<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\NodeSearch $searchModel
 */

$this->title = '节点';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="node-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('创建节点', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<?php echo ListView::widget([
		'dataProvider' => $dataProvider,
		'itemOptions' => ['class' => 'item'],
		'itemView' => function ($model, $key, $index, $widget) {
			return Html::a(Html::encode($model->name), ['view', 'id' => $model->id]);
		},
	]); ?>

</div>
