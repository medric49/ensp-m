<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 30/12/18
 * Time: 11:58
 */

namespace app\managers;


class MemberSessionManager
{

    const place = "memberPlace";


    public static function setHome() {
        \Yii::$app->session->set(self::place,"home");
    }

    public static function setProfil() {
        \Yii::$app->session->set(self::place,"profil");
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
    public static function setEpargnes() {
        \Yii::$app->session->set(self::place,"epargnes");
    }

    public static function setEmprunts() {
        \Yii::$app->session->set(self::place,"emprunts");
    }

    public static function setContributions() {
        \Yii::$app->session->set(self::place,"contributions");
    }

    public static function setSessions() {
        \Yii::$app->session->set(self::place,"sessions");
    }



    public static function isHome() {
        return \Yii::$app->session->get(self::place) == "home";
    }

    public static function isProfil() {
        return \Yii::$app->session->get(self::place) == "profil";
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
    public static function isEpargnes() {
        return \Yii::$app->session->get(self::place) == "epargnes";
    }

    public static function isEmprunts() {
        return \Yii::$app->session->get(self::place) == "emprunts";
    }

    public static function isContributions() {
        return \Yii::$app->session->get(self::place) == "contributions";
    }

    public static function isSessions() {
        return \Yii::$app->session->get(self::place) == "sessions";
    }
}