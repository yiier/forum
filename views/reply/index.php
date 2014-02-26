<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\ReplySearch $searchModel
 */

$this->title = 'Replies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reply-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create Reply', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<?php echo ListView::widget([
		'dataProvider' => $dataProvider,
		'itemOptions' => ['class' => 'item'],
		'itemView' => function ($model, $key, $index, $widget) {
			return Html::a(Html::encode($model->id), ['view', 'id' => $model->id]);
		},
	]); ?>

</div>
