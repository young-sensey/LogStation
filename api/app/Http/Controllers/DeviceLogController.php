<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeviceLogUpdateRequest;
use App\Http\Requests\DeviceLogViewRequest;
use App\Models\Device;
use App\Models\DeviceLog;
use Illuminate\Http\Response;

class DeviceLogController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function view(DeviceLogViewRequest $request): array
    {
        $deviceId = $request->input('device_id');
        return DeviceLog::query()->where('device_id', $deviceId)->get()->toArray();
    }

    public function upload(DeviceLogUpdateRequest $request): Response
    {
        $deviceId = $request->input('device_id');
        $device = Device::query()->find($deviceId);
        if ($device === null) {
            return response('', 403);
        }

        DeviceLog::query()->create([
            'device_id' => $deviceId,
            'log_date' => $request->input('log_date'),
        ]);

        return response('', 201);
    }
}
