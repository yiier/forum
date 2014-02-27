<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Node;

/**
 * @var yii\web\View $this
 * @var app\models\Node $model
 * @var yii\widgets\ActiveForm $form
 */
if (!$model->isNewRecord) {
    $node_check = Node::find($model->id);
    $parent = $node_check->parent()->one();
}
$nodes = Node::find()->roots()->all();
$level = 0;
?>

<div class="node-form">

	<?php $form = ActiveForm::begin(); ?>
	
		<div class="form-group field-node-name required">
		<!-- <label class="control-label" for="parent-node">请选择父节点</label> -->
		<select id="parent-node" name="node[parent]">
			<option value="0" selected="selected">请选择父节点</option>
			<?php foreach ($nodes as $key => $value): ?>
			<?php if (!$model->isNewRecord): ?>
			<option value="<?=$value->id?>" selected="selected"><?=$value->name?></option>
			<?php else: ?>
			<option value="<?=$value->id?>"><?=$value->name?></option>	
			<?php endif ?>
			<?php $children = $value->descendants()->all();?>
				<?php foreach ($children as $child): ?>
				<?php $string = '&nbsp;&nbsp;';
		        $string .= str_repeat('│&nbsp;&nbsp;', $child->level - $level - 1);
		        if ($child->isLeaf() && !$child->next()->one()) {
		            $string .= '└';
		        } else {

		            $string .= '├';
		        }
		        $string .= '─' . $child->name;
		        ?>
		        <?php if (!$model->isNewRecord): ?>
		            <?php if (isset($parent->id)&&($parent->id == $child->id)): ?>
		                <option value="<?= $child->id ?>" selected="selected"><?=$string?></option>
		            <?php else: ?>
		                <option value="<?= $child->id ?>" ><?=$string?></option>
		            <?php endif ?>
		        <?php else: ?>
		            <option value="<?= $child->id ?>" ><?=$string?></option>
		        <?php endif ?>

				
				<?php endforeach ?>
				
			<?php endforeach ?>

		</select></div></div>

		<div class="help-block">名称不能为空。</div>
		</div>

		<?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

		<?= $form->field($model, 'summary')->textArea(['maxlength' => 255]) ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
