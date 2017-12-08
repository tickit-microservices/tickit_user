<?php

namespace app\transformers;

use app\entities\models\User;

class UserLoginTransformer extends UserTransformer
{
    /**
     * @param User $user
     *
     * @return array
     */
    public function transform(User $user)
    {
        $userTransformed = parent::transform($user);

        $userLoginTransformed = [
            'user' => $userTransformed,
            'token' => $user->userAccessToken->token,
            'expired' => $user->userAccessToken->expire
        ];

        return $userLoginTransformed;
    }
}