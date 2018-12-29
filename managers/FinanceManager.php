<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 29/12/18
 * Time: 20:33
 */

namespace app\managers;


use app\models\Borrowing;
use app\models\Exercise;
use app\models\Refund;
use app\models\Saving;
use app\models\Session;

class FinanceManager
{

    public static function exerciseAmount() {
        return self::totalSavedAmount()+self::totalRefundedAmount()-self::totalBorrowedAmount();
    }

    public static function totalSavedAmount() {
        $exercise = Exercise::findOne(['active' => true]);
        $sessions = Session::find()->select('id')->where(['exercise_id' => $exercise->id])->column();
        return Saving::find()->where(['session_id' => $sessions])->sum('amount') ;
    }

    public static function totalBorrowedAmount() {
        $exercise = Exercise::findOne(['active' => true]);

        $sessions = Session::find()->select('id')->where(['exercise_id' => $exercise->id])->column();

        return Borrowing::find()->where(['session_id' => $sessions])->sum('amount') ;
    }

    public static function totalRefundedAmount() {
        $exercise = Exercise::findOne(['active' => true]);

        $sessions = Session::find()->select('id')->where(['exercise_id' => $exercise->id])->column();

        return Refund::find()->where(['session_id' => $sessions])->sum('amount') ;
    }

    public static function numberOfSession(){
        $exercise = Exercise::findOne(['active' => true]);
        if ($exercise) {
            return count(Session::findAll(['exercise_id' => $exercise->id]));
        }
        return 0;
    }

    public static function exerciseSavings() {
        $exercise = Exercise::findOne(['active' => true]);
        $sessions = Session::find()->select('id')->where(['exercise_id' => $exercise->id])->column();
        return Saving::find()->where(['session_id' => $sessions])->all();
    }


}