<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 27/12/18
 * Time: 22:21
 */

namespace app\models\forms;


use yii\base\Model;

class NewSessionForm extends Model
{
    public $date;

    public function rules()
    {
        return [
            ['date','date','format' => 'yyyy-M-d'],
            ['date','required']
        ];
    }
}