<?php

namespace app\models;

/**
 * This is the model class for table "tbl_reply".
 *
 * @property integer $id
 * @property integer $topic_id
 * @property string $content
 * @property integer $user_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class Reply extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'tbl_reply';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['topic_id', 'content', 'user_id', 'created_at', 'updated_at'], 'required'],
			[['topic_id', 'user_id', 'created_at', 'updated_at'], 'integer'],
			[['content'], 'string']
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
}
