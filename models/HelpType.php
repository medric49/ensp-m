<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 27/12/18
 * Time: 13:37
 */

namespace app\models;


use yii\db\ActiveRecord;

class HelpType extends ActiveRecord
{
    public function helps() {
        return Help::findAll(['help_type_id' => $this->id]);
    }
}