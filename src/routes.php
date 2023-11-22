<?php

use Core\Router;
use Core\Database;
use Src\Controllers\UserController;
use Src\Model\UserModel;
use Src\Services\UserService;

$router = new Router();

$userController = new UserController(new UserService(new UserModel(new Database())));

$router->get('/users', [$userController, 'getAll']);

$router->get('/users/(int:id)', [$userController, 'getById']);

$router->dispatch();
