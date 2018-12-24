<?php

namespace app\components;

class RouteManager {

    public $routes = [

        // ============================ ESPACE ETRANGER ===============================
        'guest.welcome' => '/guest/accueil',
        'guest.connection' => "/guest/connexion",
        'guest.member' => "/guest/membre",
        'guest.administrator' => '/guest/administrateur'

        // ============================ ESPACE ADMINSTRATEUR ==========================



        // ============================ ESPACE MEMBRE =================================


    ];

    public function __construct()
    {
        foreach ($this->routes as $index=>$route ) {
            \Yii::setAlias($index,"/ensp-m/web".$route);
        }
    }

}