<?php

namespace app\system\middlewares;

use app\system\App;
use app\system\exceptions\ForbiddenException;

class AuthMiddleware extends BaseMiddleware
{

    public array $actions = [];

    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        if(App::isGuest()){

            if(empty($this->actions) || in_array(App::$app->controller->action, $this->actions)) throw new ForbiddenException();
            
        }
    }
}
