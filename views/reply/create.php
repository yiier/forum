<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Reply $model
 */

$this->title = 'Create Reply';
$this->params['breadcrumbs'][] = ['label' => 'Replies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reply-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
