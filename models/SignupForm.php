<?php
namespace app\models;

use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
	public $username;
	public $email;
	public $password;

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['username', 'filter', 'filter' => 'trim'],
			['username', 'required'],
			['username', 'string', 'min' => 2, 'max' => 255],

			['email', 'filter', 'filter' => 'trim'],
			['email', 'required'],
			['email', 'email'],
			['email', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This email address has already been taken.'],

			['password', 'required'],
			['password', 'string', 'min' => 5],
		];
	}

	public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'email' => '邮箱',
            'password' => '密码',
        ];
    }

	/**
	 * Signs user up.
	 *
	 * @return User|null the saved model or null if saving fails
	 */
	public function signup()
	{
		if ($this->validate()) {
			return User::create($this->attributes);
		}
		return null;
	}

}