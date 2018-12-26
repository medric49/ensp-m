<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 23/12/18
 * Time: 20:05
 */

namespace app\controllers;


use yii\base\Module;
use yii\web\Controller;

class MemberController extends Controller
{

    public $layout = "member_base";

    public function __construct($id, Module $module, array $config = [])
    {
        parent::__construct($id, $module, $config);

        if (!\Yii::$app->user->getIsGuest()) {
            $user = User::findOne(\Yii::$app->user->getId());
            if ( $user->type != "MEMBER") {
                return $this->redirect("@member.home");
            }
        }
        else
            return $this->redirect("@guest.connection");
    }


    public function actionAccueil() {
        return $this->render('home');
    }

    public function actionDeconnexion() {
        if (\Yii::$app->request->post()) {
            \Yii::$app->user->logout();
            return $this->redirect('@guest.connection');
        }
        return $this->redirect('@member.home');
    }
}