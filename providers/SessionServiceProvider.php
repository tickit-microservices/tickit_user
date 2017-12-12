<?php

namespace app\providers;

use app\services\JWTService;
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

            /** @var JWTService $jwtService */
            $jwtService = Yii::$container->get(JWTService::class);

            return new SessionService($userService, $jwtService);
        });

        Yii::$container->setSingleton(JWTService::class, function () {
            return new JWTService();
        });
    }
}