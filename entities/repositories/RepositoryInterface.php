<?php

namespace app\entities\repositories;

use yii\db\ActiveRecord;


/**
 * Interface RepositoryInterface
 *
 * @todo Remove the ActiveRecord param hint
 *
 * @package app\entities\repositories
 */
interface RepositoryInterface
{
    /**
     *
     * @param ActiveRecord $model
     *
     * @return mixed
     */
    public function save(ActiveRecord $model);

    /**
     * @param ActiveRecord $model
     *
     * @return mixed
     */
    public function delete(ActiveRecord $model);

    /**
     * @param array $conditions
     * @param int $page
     * @param int $pageSize
     *
     * @return mixed
     */
    public function paginate($conditions = [], $page = 1, $pageSize = 20);

    /**
     * @param array $conditions
     *
     * @return mixed
     */
    public function find($conditions = []);
}