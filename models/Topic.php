<?php

namespace app\models;

/**
 * This is the model class for table "tbl_topic".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $node_id
 * @property integer $user_id
 * @property integer $first
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $replies_count
 * @property integer $last_reply_user_id
 * @property integer $replied_at
 */
class Topic extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'tbl_topic';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['title', 'content', 'node_id', 'user_id', 'created_at', 'updated_at', 'last_reply_user_id', 'replied_at'], 'required'],
			[['content'], 'string'],
			[['node_id', 'user_id', 'first', 'created_at', 'updated_at', 'replies_count', 'last_reply_user_id', 'replied_at'], 'integer'],
			[['title'], 'string', 'max' => 255]
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
			'node_id' => 'Node ID',
			'user_id' => 'User ID',
			'first' => 'First',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'replies_count' => 'Replies Count',
			'last_reply_user_id' => 'Last Reply User ID',
			'replied_at' => 'Replied At',
		];
	}
}
