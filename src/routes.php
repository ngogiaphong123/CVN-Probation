<?php

use Core\Router;
use Core\Database;
use Src\Controllers\UserController;
use Src\Model\User;

$router = new Router();
$userController = new UserController(new User(new Database()));

$router->get('/users', [$userController, 'getAll']);

$router->dispatch();
