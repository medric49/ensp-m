<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 31/12/18
 * Time: 14:37
 */

namespace app\models\forms;


use yii\base\Model;

class NewHelpForm extends Model
{
    public $member_id;
    public $limit_date;
    public $comments;
    public $help_type_id;

    public function rules()
    {
        return [
            [['member_id','help_type_id'],'integer','min' => 1],
            [['comments','member_id','help_type_id','limit_date'],'required'],
            [['limit_date'],'datetime','format' => 'yyyy-M-d'],
            ['comments','string']
        ];
    }

}