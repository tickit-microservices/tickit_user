<?php

namespace app\transformers;

use app\entities\models\User;

class UserTransformer extends BaseTransformer
{
    /**
     * @param User $user
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'firstName' => $user->first_name,
            'lastName' => $user->last_name,
            'email' => $user->email
        ];
    }
}