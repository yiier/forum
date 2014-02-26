<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reply;

/**
 * ReplySearch represents the model behind the search form about `app\models\Reply`.
 */
class ReplySearch extends Model
{
	public $id;
	public $topic_id;
	public $content;
	public $user_id;
	public $created_at;
	public $updated_at;

	public function rules()
	{
		return [
			[['id', 'topic_id', 'user_id', 'created_at', 'updated_at'], 'integer'],
			[['content'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'topic_id' => 'Topic ID',
			'content' => 'Content',
			'user_id' => 'User ID',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		];
	}

	public function search($params)
	{
		$query = Reply::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'id');
		$this->addCondition($query, 'topic_id');
		$this->addCondition($query, 'content', true);
		$this->addCondition($query, 'user_id');
		$this->addCondition($query, 'created_at');
		$this->addCondition($query, 'updated_at');
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
