<?php

function responseJson($status = 200, $data = [], $messages = []): false|string
{
    http_response_code($status);
    return json_encode([
        'status' => $status,
        'messages' => $messages,
        'data' => $data
    ]);
}
