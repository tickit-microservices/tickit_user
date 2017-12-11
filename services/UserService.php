<?php

namespace app\services;

use app\exceptions\UserRegistrationException;
use Exception;
use Yii;

class UserService extends BaseService
{
    /**
     * @param array $userData
     * @param bool $runValidation
     *
     * @return mixed
     *
     * @throws Exception
     * @throws \yii\base\Exception
     */
    public function save(array $userData, $runValidation = true)
    {
        $email = $userData['email'] ?? '';

        if ($this->emailExisted($email)) {
            throw new UserRegistrationException(sprintf("User with email '%s' existed", $email));
        }

        $password = $userData['password'] ?? '';
        $userData['password'] = Yii::$app->getSecurity()->generatePasswordHash($password);

        return parent::save($userData);
    }

    /**
     * Check if user with a specific email is existed or not
     *
     * @param string $email
     *
     * @return bool
     */
    private function emailExisted(string $email)
    {
        $user = $this->findOne(['email' => $email]);

        return $user !== null;
    }
}