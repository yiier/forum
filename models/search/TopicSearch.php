<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Topic;

/**
 * TopicSearch represents the model behind the search form about `app\models\Topic`.
 */
class TopicSearch extends Model
{
	public $id;
	public $title;
	public $content;
	public $source;
	public $node_id;
	public $user_id;
	public $created_at;
	public $updated_at;
	public $replies_count;
	public $last_reply_user_id;
	public $replied_at;

	public function rules()
	{
		return [
			[['id', 'node_id', 'user_id', 'created_at', 'updated_at', 'replies_count', 'last_reply_user_id', 'replied_at'], 'integer'],
			[['title', 'content', 'source'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'title' => 'Title',
			'content' => 'Content',
			'source' => 'source',
			'node_id' => 'Node ID',
			'user_id' => 'User ID',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'replies_count' => 'Replies Count',
			'last_reply_user_id' => 'Last Reply User ID',
			'replied_at' => 'Replied At',
		];
	}

	public function search($params)
	{
		$query = Topic::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'id');
		$this->addCondition($query, 'title', true);
		$this->addCondition($query, 'content', true);
		$this->addCondition($query, 'source', true);
		$this->addCondition($query, 'node_id');
		$this->addCondition($query, 'user_id');
		$this->addCondition($query, 'created_at');
		$this->addCondition($query, 'updated_at');
		$this->addCondition($query, 'replies_count');
		$this->addCondition($query, 'last_reply_user_id');
		$this->addCondition($query, 'replied_at');
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
