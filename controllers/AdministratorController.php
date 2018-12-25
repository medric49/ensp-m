<?php
/**
 * Created by PhpStorm.
 * User: medric
 * Date: 23/12/18
 * Time: 20:03
 */

namespace app\controllers;


use yii\base\Module;
use yii\web\Controller;

class AdministratorController extends Controller
{
    public $layout = "administrator_base";
    public function __construct($id, Module $module, array $config = [])
    {
        parent::__construct($id, $module, $config);
    }

    public function actionAccueil() {

        return $this->render('home');
    }
}