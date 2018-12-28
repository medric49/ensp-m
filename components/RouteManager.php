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
        // ============================ ESPACE MEMBRE =================================
        'member.home' => '/member/accueil',
        'member.disconnection' => '/member/deconnexion',
        'member.profil' => '/member/profil',
        'member.epargnes' => '/member/epargnes',
        'member.emprunts' => '/member/emprunts',
        'member.typesaide' => '/member/typesaide',
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