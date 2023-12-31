<?php

namespace Src\Controllers;

use Core\BaseController;
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

    public function create(): void
    {
        $data = $this->jsonBody();
        echo $this->response(201, $this->service->create($data));
    }
}
