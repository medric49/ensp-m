<?php

namespace app\components;

class RouteManager {

    public $routes = [

        // ============================ ESPACE ETRANGER ===============================
        'guest.welcome' => '/guest/accueil',
        'guest.connection' => "/guest/connexion",

        'guest.member_form' => "/guest/member-form",
        'guest.administrator_form' => '/guest/administrator-form',

        // ============================ ESPACE ADMINSTRATEUR ==========================


        'administrator.home' => '/administrator/accueil',


        // ============================ ESPACE MEMBRE =================================
        'member.home' => '/member/accueil',

    ];

    public function __construct()
    {
        foreach ($this->routes as $index=>$route ) {
            \Yii::setAlias($index,"/ensp-m/web".$route);
        }
    }

}