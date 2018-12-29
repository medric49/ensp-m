<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 29/12/18
 * Time: 20:19
 */

namespace app\managers;


class SettingManager
{
    const INTEREST = 10;

    public static function getInterest() {
        return self::INTEREST;
    }
}