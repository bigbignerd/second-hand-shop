<?php
namespace backend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $phone;
    public $role;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required','message'=>'用户名不能为空'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required','message'=>'邮箱地址不能为空'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['phone', 'unique', 'targetClass' => '\common\models\User', 'message' => '手机号码已存在'],
            ['role', 'required','message'=>'请选择注册为买家还是卖家'],
            ['password', 'required','message'=>'密码不能为空'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->role = $this->role;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->phone = $this->phone;
        $user->generateAuthKey();
        if($user->isNewRecord){
            $user->created_at = time();
        }
        $user->updated_at = time();
        $user->save();
        return $user->save() ? $user : null;
    }
}
