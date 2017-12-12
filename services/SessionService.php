<?php

namespace app\services;

use app\entities\models\User;
use app\entities\models\UserAccessToken;
use app\exceptions\InvalidCredentialException;
use Yii;

class SessionService
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * @var JWTService
     */
    private $jwtService;

    /**
     * SessionService constructor.
     *
     * @param UserService $userService
     * @param JWTService $jwtService
     */
    public function __construct(
        UserService $userService,
        JWTService $jwtService
    ) {
        $this->userService = $userService;
        $this->jwtService = $jwtService;
    }

    /**
     * @param string $email
     * @param string $password
     *
     * @return User
     *
     * @throws InvalidCredentialException
     */
    public function login(string $email, string $password)
    {
        $user = $this->userService->findOne(['email' => $email]);

        if (!$user) {
            throw new InvalidCredentialException('Wrong email or password');
        }

        $this->validatePassword($password, $user->password);

        $this->generateAccessToken($user);

        return $user;
    }

    /**
     * @param string $password
     * @param string $passwordHash
     *
     * @throws InvalidCredentialException
     */
    private function validatePassword(string $password, string $passwordHash)
    {
        if (!Yii::$app->getSecurity()->validatePassword($password, $passwordHash)) {
            throw new InvalidCredentialException('Wrong email or password');
        }
    }

    /**
     * @param User $user
     */
    private function generateAccessToken(User $user)
    {
        $token = $this->jwtService->generate($user->id);

        $userAccessToken = new UserAccessToken([
            'token' => $token,
            'user_id' => $user->id,
            'expire' => date('Y-m-d h:i:s', strtotime('+1 week'))
        ]);

        $userAccessToken->save();
    }
}