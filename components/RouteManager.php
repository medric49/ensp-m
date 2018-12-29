<?php

namespace app\components;

class RouteManager {

    private $routes = [

        // ============================ ESPACE ETRANGER ===============================
        'guest.welcome' => '/guest/accueil',
        'guest.connection' => "/guest/connexion",

        'guest.member_form' => "/guest/member-form",
        'guest.administrator_form' => '/guest/administrator-form',

        // ============================ ESPACE ADMINSTRATEUR ==========================


        'administrator.home' => '/administrator/accueil',
        'administrator.disconnection' => '/administrator/deconnexion',
        'administrator.members' => '/administrator/membres',
        'administrator.new_member' => '/administrator/nouveau-membre',
        'administrator.add_member' => '/administrator/ajouter-member',
        'administrator.profile' => '/administrator/profil',
        'administrator.update_profile' => '/administrator/modifier-profil',
        'administrator.update_social_information' => '/administrator/modifier-information-sociale',
        'administrator.update_password' => '/administrator/modifier-mot-de-passe',

        'administrator.help_types' => '/administrator/types-aide',
        'administrator.new_help_type' => '/administrator/nouveau-type-aide',
        'administrator.update_help_type' => '/administrator/modifier-type-aide',
        'administrator.add_help_type' => '/administrator/ajouter-type-aide',
        'administrator.apply_help_type_update' => '/administrator/appliquer-modification-type-aide',
        'administrator.delete_help_type' => '/administrator/supprimer-type-aide',
        'administrator.administrators' => '/administrator/administrateurs',
        'administrator.new_session' => '/administrator/nouvelle-session',
        'administrator.savings' => '/administrator/epargnes',
        'administrator.new_saving'=> '/administrator/nouvelle-epargne',
        'administrator.borrowings' => '/administrator/emprunts',
        'administrator.new_borrowing' => '/administrator/nouvelle-emprunt',
        'administrator.helps' => '/administrator/aides',
        'administrator.sessions' => '/administrator/sessions',
        'administrator.refunds' => '/administrator/remboursements',

        'administrator.go_to_refunds' => '/administrator/passer-aux-remboursements',
        'administrator.go_to_borrowings' => '/administrator/passer-aux-emprunts',
        'administrator.cloture_session' => '/administrator/cloturer-session',
        'administrator.back_to_refunds' => '/administrator/rentrer-aux-remboursements',
        'administrator.back_to_savings' => '/administrator/rentrer-aux-epargnes',


        // ============================ ESPACE MEMBRE =================================
        'member.home' => '/member/accueil',
        'member.disconnection' => '/member/deconnexion',

    ];

    private $paths = [
        'admin_avatar_path' => '/avatar/admin/',
        'member_avatar_path' => '/avatar/member/'
    ];

    public function __construct()
    {
        \Yii::$app->getErrorHandler()->errorAction = "page/error";
        foreach ($this->routes as $index=>$route ) {
            \Yii::setAlias($index,$route);
        }

        foreach ($this->paths as $index=>$path ) {
            \Yii::setAlias($index,$path);
        }
    }

}