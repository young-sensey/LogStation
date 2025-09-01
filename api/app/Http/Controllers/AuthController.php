<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return string
     */
    public function token(Request $request): string
    {
        $deviceId = $request->input('device_id');
        if ($deviceId === null) {
            $device = Device::query()->first();
        } else {
            $device = Device::query()->firstWhere('uuid', $deviceId);
        }

        return $device->createToken('api')->plainTextToken;
    }
}
