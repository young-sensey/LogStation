<?php

namespace App\Http\Controllers;

use App\Models\Device;

class AuthController extends Controller
{
    public function token(): string
    {
        $device = Device::query()->first();

        return $device->createToken('api')->plainTextToken;
    }
}
