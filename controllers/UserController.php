<?php

namespace app\controllers;

use app\services\UserService;
use app\transformers\UserTransformer;
use Exception;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
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

        $userIds = $this->request->get('ids') ?? [];

        $pagination = $this->userService->paginate(['id' => $userIds], $page, $pageSize);

        return $this->responsePagination($pagination, $this->userTransformer);
    }

    /**
     * Action create an user
     *
     * @return mixed
     *
     * @throws Exception
     * @throws \yii\base\Exception
     */
    public function actionCreate()
    {
        $userData = $this->request->post();

        $user = $this->userService->save($userData);

        return $this->responseItem(new Item($user, $this->userTransformer));
    }
}