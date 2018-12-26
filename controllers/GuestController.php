<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 23/12/18
 * Time: 20:00
 */

namespace app\controllers;


use app\models\Administrator;
use app\models\AdministratorConnectionForm;
use app\models\Member;
use app\models\MemberConnectionForm;
use app\models\User;
use Yii;
use yii\base\Module;
use yii\web\Controller;

class GuestController extends Controller
{

    public $layout = "guest_base";

    public function __construct($id, Module $module, array $config = [])
    {
        parent::__construct($id, $module, $config);


        if (!\Yii::$app->user->getIsGuest()) {
            $user = User::findOne(Yii::$app->user->getId());
            if ($user->type == "ADMINISTRATOR") {
                return $this->redirect("@administrator.home");
            }
            else {
                return $this->redirect("@member.home");
            }
        }
    }

    public function actionAccueil() {
        return $this->render('home');
    }

    public function actionConnexion() {
        $memberModel = new MemberConnectionForm();
        $administratorModel = new AdministratorConnectionForm();


        return $this->render('connection',['member' => $memberModel, 'administrator' => $administratorModel]);
    }

    public function actionMemberForm() {
        if (\Yii::$app->request->post()) {
            $memberModel = new MemberConnectionForm();
            $administratorModel = new AdministratorConnectionForm();

            $memberModel->attributes = Yii::$app->request->post();
            if ($memberModel->validate()) {
                $member = Member::findOne(['username' => $memberModel->username]);
                if ($member) {

                    $user = User::findIdentity($member->user_id);

                    if ($user) {
                        if ($user->validatePassword($memberModel->password)) {

                            if ($memberModel->rememberMe) {
                                \Yii::$app->user->login($user, 3600*24*30);
                            }
                            else {
                                \Yii::$app->user->login($user);
                            }
                            return $this->redirect('@member.home');

                        }
                    }
                }
            }
            return $this->render('connection',['member' => $memberModel, 'administrator' => $administratorModel]);
        }
        return $this->redirect("@guest.connection");
    }

    public function actionAdministratorForm() {
        if (\Yii::$app->request->post()){
            $administratorModel = new AdministratorConnectionForm();
            $memberModel = new MemberConnectionForm();

            $administratorModel->attributes = Yii::$app->request->post();

            if ($administratorModel->validate()) {
                $administrator = Administrator::findOne(['username' => $administratorModel->username]);
                if ($administrator) {
                    $user = User::findIdentity($administrator->user_id);
                    if ($user) {
                        if ($user->validatePassword($administratorModel->password)) {
                            if ($administratorModel->remember) {
                                Yii::$app->user->login($user, 3600*24*30);
                            }
                            else
                            {
                                Yii::$app->user->login($user);
                            }

                            return $this->redirect('@administrator.home');
                        }
                    }
                }

            }
            return $this->render('connection',['member' => $memberModel, 'administrator' => $administratorModel]);
        }
        return $this->redirect('@guest.connection');

    }
}