<?php

namespace app\controllers;

use app\services\UserService;
use app\transformers\UserTransformer;
use League\Fractal\Manager;
use yii\base\Module;

class UserController extends BaseController
{
    private $userService;

    private $userTransformer;

    /**
     * UserController constructor.
     *
     * @param string $id
     * @param Module $module
     * @param Manager $manager
     * @param UserService $userService
     * @param UserTransformer $userTransformer
     * @param array $config
     */
    public function __construct(
        $id,
        Module $module,
        Manager $manager,
        UserService $userService,
        UserTransformer $userTransformer,
        array $config = []
    ) {
        parent::__construct($id, $module, $manager, $config);

        $this->userService = $userService;
        $this->userTransformer = $userTransformer;
    }

    /**
     * Action list users
     */
    public function actionIndex()
    {
        $page = $this->request->get('page') ?? 1;
        $pageSize = $this->request->get('pageSize') ?? 20;

        $pagination = $this->userService->paginate([], $page, $pageSize);

        return $this->responsePagination($pagination, $this->userTransformer);
    }

    public function actionCreate()
    {
        echo 'Create an user';
    }
}