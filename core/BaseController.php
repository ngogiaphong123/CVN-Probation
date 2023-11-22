<?php

namespace Core;

class BaseController
{
    public function response($status = 200, $data = [], $messages = []): false|string
    {
        return json_encode([
            'status' => $status,
            'messages' => $messages,
            'data' => $data
        ]);
    }
}
