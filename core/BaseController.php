<?php

namespace Core;

class BaseController
{
    public function response($status = 200, $data = [], $messages = []): false|string
    {
        header('Content-type: application/json');
        http_response_code($status);
        return json_encode([
            'status' => $status,
            'data' => $data,
            'messages' => $messages
        ]);
    }

    public function params(): array
    {
        return $_SERVER['REQUEST_METHOD'] === 'GET' ? $_GET : $_POST;
    }

    public function jsonBody(): array
    {
        $body = json_decode(file_get_contents('php://input'), true);
        return $body ? $body : [];
    }
}
