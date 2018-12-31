<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 31/12/18
 * Time: 12:31
 */

namespace app\models\forms;


use yii\base\Model;

class NewAdministratorForm extends Model
{
    public $username;
    public $name;
    public $first_name;
    public $tel;
    public $email;
    public $avatar;
    public $password;

    public function rules()
    {
        return [
            [['username','name','first_name','tel','password'],'string'],
            [['username','name','first_name','tel','password','email'],'required'],
            [['email'],'email'],
            [['avatar'],'image'],
        ];
    }
}