<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Node $model
 */

$this->title = '更新节点: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '节点', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="node-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
