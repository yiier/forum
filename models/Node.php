<?php

namespace app\models;

/**
 * This is the model class for table "tbl_node".
 *
 * @property string $id
 * @property string $name
 * @property string $summary
 * @property integer $topics_count
 * @property string $lft
 * @property string $rgt
 * @property integer $level
 */
class Node extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'tbl_node';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['name'], 'required'],
			[['topics_count'], 'integer'],
			[['name', 'summary'], 'string', 'max' => 255]
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

	public function behaviors() {
        return [
            [
                'class' => \creocoder\behaviors\NestedSet::className(),
            ],
        ];
    }

    public static function createQuery($config = [])
	{
		$config['modelClass'] = get_called_class();
		return new \app\models\NodeQuery($config);
	}
}
