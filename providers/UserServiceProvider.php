<?php

namespace app\providers;

use app\entities\models\User;
use app\entities\repositories\ActiveRecord\UserRepository;
use app\entities\repositories\UserRepositoryInterface;
use app\services\UserService;
use Yii;
use yii\base\BootstrapInterface;

class UserServiceProvider implements BootstrapInterface
{
    public function bootstrap($app)
    {
        Yii::$container->setSingleton(UserRepositoryInterface::class, function () {
            return new UserRepository(new User());
        });

        Yii::$container->setSingleton(UserService::class, function () {
            /** @var UserRepositoryInterface $userRepository */
            $userRepository = Yii::$container->get(UserRepositoryInterface::class);

            return new UserService($userRepository);
        });
    }
}