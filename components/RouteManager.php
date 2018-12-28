<?php

namespace app\components;

class RouteManager {

    private $routes = [

        // ============================ ESPACE ETRANGER ===============================
        'guest.welcome' => '/guest/accueil',
        'guest.connection' => "/guest/connexion",

        'guest.member_form' => "/guest/member-form",
        'guest.administrator_form' => '/guest/administrator-form',

        // ============================ ESPACE ADMINISTRATEUR ==========================


        'administrator.home' => '/administrator/accueil',
        'administrator.disconnection' => '/administrator/deconnexion',
        'administrator.members' => '/administrator/membres',
        'administrator.new_member' => '/administrator/nouveau-membre',
        'administrator.add_member' => '/administrator/ajouter-member',

        // ============================ ESPACE MEMBRE =================================
        'member.home' => '/member/accueil',
        'member.disconnection' => '/member/deconnexion',
        'member.profil' => '/member/profil',
        'member.epargnes' => '/member/epargnes',
        'member.emprunts' => '/member/emprunts',
        'member.types_aide' => '/member/types_aide',
        'member.contributions' => '/member/contributions',
        'member.modifier_profil' => '/member/modifiersonprofil',

    ];

    private $paths = [
        'admin_avatar_path' => '/avatar/admin/',
        'member_avatar_path' => '/avatar/member/'
    ];

    public function __construct()
    {
        foreach ($this->routes as $index=>$route ) {
            \Yii::setAlias($index,$route);
        }

        foreach ($this->paths as $index=>$path ) {
            \Yii::setAlias($index,$path);
        }
    }

}