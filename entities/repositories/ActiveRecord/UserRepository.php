<?php

namespace app\entities\repositories\ActiveRecord;

use app\entities\repositories\UserRepositoryInterface;
use app\entities\models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}