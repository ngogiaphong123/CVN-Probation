<?php

namespace Src\Services;

use Core\BaseService;
use Src\Model\UserModel;

class UserService extends BaseService
{
    private UserModel $model;
    public function __construct(UserModel $model)
    {
        $this->model = $model;
    }
    public function getAll(): array
    {
        return $this->model->get();
    }

    public function create($data)
    {
        return $this->model->create($data);
    }
}
