<?php

namespace app\entities\repositories\ActiveRecord;

use app\entities\Pagination;
use app\entities\repositories\RepositoryInterface;
use yii\db\ActiveRecord;

class BaseRepository implements RepositoryInterface
{
    /**
     * @var ActiveRecord
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param ActiveRecord $model
     */
    public function __construct(ActiveRecord $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritdoc
     */
    public function save(ActiveRecord $model)
    {
        // TODO: Implement save() method.
    }

    /**
     * @inheritdoc
     */
    public function delete(ActiveRecord $model)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @inheritdoc
     */
    public function paginate($conditions = [], $page = 1, $pageSize = 20)
    {
        $query = $this->model
            ->find()
            ->where($conditions);

        $models = $query->limit($pageSize)
                ->offset(($page - 1) * $pageSize)
                ->all();

        $total = $query->count();

        return new Pagination($models, $total, $page, $pageSize);
    }

    /**
     * @inheritdoc
     */
    public function find($conditions = [])
    {
        return $this->model->find()->where($conditions)->one();
    }
}