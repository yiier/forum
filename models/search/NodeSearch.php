<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Node;

/**
 * NodeSearch represents the model behind the search form about `app\models\Node`.
 */
class NodeSearch extends Model
{
	public $id;
	public $name;
	public $summary;
	public $topics_count;
	public $lft;
	public $rgt;
	public $level;

	public function rules()
	{
		return [
			[['id', 'topics_count', 'lft', 'rgt', 'level'], 'integer'],
			[['name', 'summary'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'name' => 'Name',
			'summary' => 'Summary',
			'topics_count' => 'Topics Count',
			'lft' => 'Lft',
			'rgt' => 'Rgt',
			'level' => 'Level',
		];
	}

	public function search($params)
	{
		$query = Node::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'id');
		$this->addCondition($query, 'name', true);
		$this->addCondition($query, 'summary', true);
		$this->addCondition($query, 'topics_count');
		$this->addCondition($query, 'lft');
		$this->addCondition($query, 'rgt');
		$this->addCondition($query, 'level');
		return $dataProvider;
	}

	protected function addCondition($query, $attribute, $partialMatch = false)
	{
		if (($pos = strrpos($attribute, '.')) !== false) {
			$modelAttribute = substr($attribute, $pos + 1);
		} else {
			$modelAttribute = $attribute;
		}

		$value = $this->$modelAttribute;
		if (trim($value) === '') {
			return;
		}
		if ($partialMatch) {
			$query->andWhere(['like', $attribute, $value]);
		} else {
			$query->andWhere([$attribute => $value]);
		}
	}
}
