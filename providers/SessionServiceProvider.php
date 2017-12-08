<?php

namespace app\providers;

use app\services\SessionService;
use app\services\UserService;
use Yii;
use yii\base\BootstrapInterface;

class SessionServiceProvider implements BootstrapInterface
{
    public function bootstrap($app)
    {
        Yii::$container->setSingleton(SessionService::class, function () {
            /** @var UserService $userService */
            $userService = Yii::$container->get(UserService::class);

            return new SessionService($userService);
        });
    }
}