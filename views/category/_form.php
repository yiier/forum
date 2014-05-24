<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;

/**
 * @var yii\web\View $this
 * @var app\models\Node $model
 * @var yii\widgets\ActiveForm $form
 */
$category = new Category;
$Categories = $category->roots()->all();
$level = 0;

$items[0] = Yii::t('app', 'Please select the parent node');
foreach ($Categories as $key => $value){
	
    $items[$value->attributes['id']]=$value->attributes['name'];
    $children = $value->descendants()->all();
    foreach ($children as $child){
        $string = '  ';
        $string .= str_repeat('│  ', $child->level - $level - 1);
        if ($child->isLeaf() && !$child->next()->one()) {
            $string .= '└';
        } else {

            $string .= '├';
        }
        $string .= '─' . $child->name;
        $items[$child->id]=$string;
    }
}

if (!$model->isNewRecord) {
    $parent = $model->parent()->one();
}
?>

<div class="node-form">

	<?php $form = ActiveForm::begin(); ?>
	
		<?php if (!$model->isNewRecord && isset($parent)) : ?>
		<?php $model->parent=$parent->id;?>
	    <?= $form->field($model, 'parent')->dropDownList($items) ?>
		<?php else:?>
	    <?= $form->field($model, 'parent')->dropDownList($items) ?>
		<?php endif?>

		<?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

		<?= $form->field($model, 'summary')->textArea(['maxlength' => 255]) ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
