<?php

namespace app\entities\models;

class UserAccessToken extends BaseModel
{
    public static function tableName()
    {
        return 'user_access_tokens';
    }
}