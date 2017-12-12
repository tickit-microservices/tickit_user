<?php

namespace app\services;

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Token;
use Yii;

class JWTService
{
    /**
     * @param int $userId
     *
     * @return Token
     */
    public function generate($userId)
    {
        $signer = new Sha256();
        $builder = new Builder();
        $secret = Yii::$app->params['appSecret'];

        return $builder
            ->setIssuedAt(time())
            ->setNotBefore(time())
            ->setExpiration(time() + 3600)
            ->set('user_id', $userId)
            ->sign($signer, $secret)
            ->getToken();
    }
}