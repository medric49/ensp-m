<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 27/12/18
 * Time: 21:47
 */

namespace app\managers;


class AdministratorSessionManager
{

    const place = "adminPlace";


    public static function setHome() {
        \Yii::$app->session->set(self::place,"home");
    }

    public static function setProfile() {
        \Yii::$app->session->set(self::place,"profile");
    }

    public static function setMembers() {
        \Yii::$app->session->set(self::place,"members");
    }

    public static function setAdministrators() {
        \Yii::$app->session->set(self::place,"administrators");
    }

    public static function setHelps() {
        \Yii::$app->session->set(self::place,"helps");
    }



    public static function isHome() {
        return \Yii::$app->session->get(self::place) == "home";
    }

    public static function isProfile() {
        return \Yii::$app->session->get(self::place) == "profile";
    }

    public static function isMembers() {
        return \Yii::$app->session->get(self::place) == "members";
    }

    public static function isAdministrators() {
        return \Yii::$app->session->get(self::place) == "administrators";
    }

    public static function isHelps() {
        return \Yii::$app->session->get(self::place) == "helps";
    }
}