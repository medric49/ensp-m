<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 27/12/18
 * Time: 12:30
 */

namespace app\models\forms;


use yii\base\Model;

class UpdateSocialInformationForm extends Model
{
    public $username;
    public $name;
    public $first_name;
    public $tel;
    public $email;
    public $avatar;

    public function rules()
    {
        return [
            [['username','name','first_name','tel','email'],'required'],
            [['username','name','first_name','tel'],'string'],
            ['email','email'],
            ['avatar','image','isEmpty' => false]
        ];
    }
}