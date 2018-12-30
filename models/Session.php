<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 27/12/18
 * Time: 22:35
 */

namespace app\models;


use yii\db\ActiveRecord;

class Session extends ActiveRecord
{

    public function totalAmount() {
        return $this->savedAmount()+$this->refundedAmount()-$this->borrowedAmount();
    }

    public function savedAmount(){
        return Saving::find()->where(['session_id' => $this->id])->sum('amount');
    }

    public function borrowedAmount() {
        return Borrowing::find()->where(['session_id' => $this->id])->sum('amount');
    }

    public function refundedAmount()  {
        return Refund::find()->where(['session_id' => $this->id])->sum('amount');
    }
}