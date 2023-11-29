<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Src\Model\UserModel;
use Src\Services\UserService;

class UserServiceTest extends TestCase
{
    public function testGetSuccessfully()
    {
        $userModelMock = $this->getMockBuilder(UserModel::class)->disableOriginalConstructor()->getMock();
        $userModelMock->method('get')->willReturn([
            [
                "id" => 1,
                "first_name" => "Pgong",
                "last_name" => "Ngo",
                "email" => "ngj@",
                "password" => "123",
                "created_at" => "2023-11-21 14:53:27",
                "updated_at" => "2023-11-21 14:53:27"
            ],
            [
                "id" => 2,
                "first_name" => "Pgong",
                "last_name" => "Ngo",
                "email" => "ngj@",
                "password" => "123",
                "created_at" => "2023-11-21 14:53:27",
                "updated_at" => "2023-11-21 14:53:27"
            ]
        ]);
        $userService = new UserService($userModelMock);
        $this->assertEquals(
            [
                [
                    "id" => 1,
                    "first_name" => "Pgong",
                    "last_name" => "Ngo",
                    "email" => "ngj@",
                    "password" => "123",
                    "created_at" => "2023-11-21 14:53:27",
                    "updated_at" => "2023-11-21 14:53:27"
                ],
                [
                    "id" => 2,
                    "first_name" => "Pgong",
                    "last_name" => "Ngo",
                    "email" => "ngj@",
                    "password" => "123",
                    "created_at" => "2023-11-21 14:53:27",
                    "updated_at" => "2023-11-21 14:53:27"
                ]
            ],
            $userService->getAll()
        );
    }

    public function testGetFailed()
    {
        $userModelMock = $this->getMockBuilder(UserModel::class)->disableOriginalConstructor()->getMock();
        $userModelMock->method('get')->willThrowException(new \Exception());
        $userService = new UserService($userModelMock);
        $this->assertEquals([], $userService->getAll());
    }

    public function testCreateSuccessfully()
    {
        $userModelMock = $this->getMockBuilder(UserModel::class)->disableOriginalConstructor()->getMock();
        $userModelMock->method('create')->willReturn([
            "id" => 1,
            "first_name" => "Pgong",
            "last_name" => "Ngo",
            "email" => "ngj@",
            "password" => "123",
            "created_at" => "2023-11-21 14:53:27",
            "updated_at" => "2023-11-21 14:53:27"
        ]);
        $userService = new UserService($userModelMock);
        $this->assertEquals(
            [
                "id" => 1,
                "last_name" => "Ngo",
                "email" => "ngj@",
                "password" => "123",
                "created_at" => "2023-11-21 14:53:27",
                "updated_at" => "2023-11-21 14:53:27"
            ],
            $userService->create([
                "first_name" => "Pgong",
                "last_name" => "Ngo",
                "email" => "ngj@",
                "password" => "123",
            ])
        );
    }
}
