<?php

namespace app\entities\repositories;

use yii\db\ActiveRecord;

interface RepositoryInterface
{
    /**
     * @todo Remove the ActiveRecord param hint
     * @param ActiveRecord $model
     * @return mixed
     */
    public function save(ActiveRecord $model);

    public function delete(ActiveRecord $model);

    public function paginate($conditions = [], $page = 1, $pageSize = 20);
}