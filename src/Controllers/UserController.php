<?php

namespace Src\Controllers;

use Core\BaseController;
use Src\Model\User;

class UserController extends BaseController
{
    private User $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getAll(): void
    {
        echo $this->response(200, $this->model->get());
    }
}
