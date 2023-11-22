<?php

namespace Src\Controllers;

use Core\BaseController;
use Src\Model\UserModel;
use Src\Services\UserService;

class UserController extends BaseController
{
    private UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function getAll(): void
    {
        echo $this->response(200, $this->service->getAll());
    }
}
