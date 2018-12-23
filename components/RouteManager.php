<?php

namespace app\components;

class RouteManager {

    public $routes = [

        'welcome' => 'guest/accueil',
    ];

    public function __construct()
    {
        foreach ($this->routes as $index=>$route ) {
            \Yii::setAlias($index,$route);
        }
    }

}