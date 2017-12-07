<?php

namespace app\services;

use app\entities\repositories\RepositoryInterface;

class BaseService
{
    protected $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function paginate($conditions = [], $page = 1, $pageSize = 20)
    {
        return $this->repository->paginate($conditions, $page, $pageSize);
    }
}