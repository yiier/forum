<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Node $model
 */

$this->title = '创建节点';
$this->params['breadcrumbs'][] = ['label' => '节点', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="node-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
