<?php

namespace Core;

class BaseModel
{
    public function handleErrors(string $message): false|string
    {
        return responseJson(400, [], $message);
    }
}
