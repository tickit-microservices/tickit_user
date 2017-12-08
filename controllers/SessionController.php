<?php

namespace app\controllers;

use app\exceptions\InvalidCredentialException;
use app\services\SessionService;
use app\transformers\UserLoginTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use yii\base\Module;

class SessionController extends BaseController
{
    /**
     * @var UserLoginTransformer
     */
    private $userLoginTransformer;

    /**
     * @var SessionService
     */
    private $sessionService;

    /**
     * SessionController constructor.
     *
     * @param string $id
     * @param Module $module
     * @param Manager $manager
     * @param SessionService $sessionService
     * @param UserLoginTransformer $userLoginTransformer
     * @param array $config
     */
    public function __construct(
        $id,
        Module $module,
        Manager $manager,
        SessionService $sessionService,
        UserLoginTransformer $userLoginTransformer,
        array $config = []
    ) {
        parent::__construct($id, $module, $manager, $config);

        $this->sessionService = $sessionService;
        $this->userLoginTransformer = $userLoginTransformer;
    }

    /**
     * @throws InvalidCredentialException
     */
    public function actionLogin()
    {
        $email = $this->request->post('email') ?? '';
        $password = $this->request->post('password') ?? '';

        $user = $this->sessionService->login($email, $password);

        $item = new Item($user, $this->userLoginTransformer);

        return $this->responseItem($item);
    }
}