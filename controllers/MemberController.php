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
    }


    public function actionAccueil() {

    }
}