<?php

namespace app\entities\models;

use yii\db\ActiveRecord;

/**
 * Class User
 *
 * @property-read UserAccessToken $userAccessToken
 *
 * @package app\entities\models
 */
class User extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @return array|null|ActiveRecord
     */
    public function getUserAccessToken()
    {
        return $this->hasMany(UserAccessToken::class, ['user_id' => 'id'])->orderBy(['id' => SORT_DESC])->one();
    }
}
