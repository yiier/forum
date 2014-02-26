<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Reply $model
 */

$this->title = 'Update Reply: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Replies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reply-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
