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
        try {
            return $this->model->get();
        } catch (\Exception $e) {
            return [];
        }
    }

    public function create($data)
    {
        return $this->model->create($data);
    }
}
