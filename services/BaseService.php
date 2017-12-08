<?php

namespace app\services;

use app\entities\repositories\RepositoryInterface;

class BaseService
{
    protected $repository;

    /**
     * BaseService constructor.
     *
     * @param RepositoryInterface $repository
     */
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @inheritdoc
     */
    public function paginate($conditions = [], $page = 1, $pageSize = 20)
    {
        return $this->repository->paginate($conditions, $page, $pageSize);
    }

    /**
     * @inheritdoc
     */
    public function find($conditions)
    {
        return $this->repository->find($conditions);
    }
}