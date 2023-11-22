<?php

namespace Core;

class BaseModel
{
    public function responseJson($status = 200, $data = [], $messages = []): false|string
    {
        return json_encode([
            'status' => $status,
            'data' => $data,
            'messages' => $messages
        ]);
    }

    public function handleErrors(string $message): false|string
    {
        return $this->responseJson(400, [], $message);
    }
}
