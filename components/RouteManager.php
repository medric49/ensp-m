<?php

namespace app\components;

class RouteManager {

    public $routes = [

        'welcome' => '/',
    ];

    public function __construct()
    {
        foreach ($this->routes as $index=>$route ) {
            \Yii::setAlias($index,$route);
        }
    }

}