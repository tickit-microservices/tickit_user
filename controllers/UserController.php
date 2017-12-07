<?php

namespace app\controllers;

use app\services\UserService;
use yii\base\Module;
use yii\web\Controller;

class UserController extends Controller
{
    private $userService;

    /**
     * UserController constructor.
     *
     * @param string $id
     * @param Module $module
     * @param UserService $userService
     * @param array $config
     */
    public function __construct($id, Module $module, UserService $userService, array $config = [])
    {
        parent::__construct($id, $module, $config);

        $this->userService = $userService;
    }

    /**
     * Action list users
     */
    public function actionIndex()
    {
        return $this->userService->paginate();
    }

    public function actionCreate()
    {
        echo 'Create an user';
    }
}