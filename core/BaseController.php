<?php

namespace Core;

class BaseController
{
    public function response($status = 200, $data = [], $messages = []): false|string
    {
        header('Content-type: application/json');
        return responseJson($status, $data, $messages);
    }

    public function params(): array
    {
        return $_SERVER['REQUEST_METHOD'] === 'GET' ? $_GET : $_POST;
    }
}
